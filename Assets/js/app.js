//variable para inicializar modal
var myModal = new bootstrap.Modal(document.getElementById("myModal"));

//Seleccionar formulario
let frm = document.getElementById("formulario");
let eliminar = document.getElementById("btnEliminar");
let cancelar = document.getElementById("btnCancelar");

document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    locale: "es",
    headerToolbar: {
      right: "prev next today",
      center: "title",
      left: "dayGridMonth timeGridWeek listWeek",
    },
    events: base_url + "Home/listar",
    editable: true,
    dateClick: function (info) {
      //console.log(info);
      frm.reset();
      document.getElementById("id").value = "";
      eliminar.classList.add("d-none");
      document.getElementById("start").value = info.dateStr;
      document.getElementById("btnAccion").textContent = "Registrar cita";
      document.getElementById("titulo").textContent = "Registro de Cita";
      myModal.show();
    },
    eventClick: function (info) {
      console.log(info);
      eliminar.classList.remove("d-none");
      document.getElementById("titulo").textContent = "Modificar Cita";
      document.getElementById("btnAccion").textContent = "Modificar";
      document.getElementById("id").value = info.event.id;
      document.getElementById("title").value = info.event.title;
      document.getElementById("start").value = info.event.startStr;
      document.getElementById("color").value = info.event.backgroundColor;
      document.getElementById("nombres").value =
        info.event.extendedProps.nombres;
      document.getElementById("apellidos").value =
        info.event.extendedProps.apellidos;
      document.getElementById("hora").value = info.event.extendedProps.hora;
      myModal.show();
      calendar.refetchEvents();
    },
    eventDrop: function (info) {
      const id = info.event.id;
      const fecha = info.event.startStr;
      const url = base_url + "Home/drop";
      const http = new XMLHttpRequest();
      const data = new FormData();
      data.append("id", id);
      data.append("fecha", fecha);
      http.open("POST", url, true);
      http.send(data);
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          //console.log(this.responseText);
          const respuesta = JSON.parse(this.responseText);
          console.log(respuesta);
          if (respuesta.estado) {
            calendar.refetchEvents();
          }
          Swal.fire("Cita Modificada", respuesta.msg, respuesta.tipo);
        }
      };
    },
  });

  calendar.render();

  frm.addEventListener("submit", function (e) {
    e.preventDefault();

    const title = document.getElementById("title").value;
    const fecha = document.getElementById("start").value;
    const color = document.getElementById("color").value;
    const nombres = document.getElementById("nombres").value;
    const apellidos = document.getElementById("apellidos").value;
    const hora = document.getElementById("hora").value;
    if (
      title == "" ||
      fecha == "" ||
      color == "" ||
      nombres == "" ||
      apellidos == "" ||
      hora == ""
    ) {
      Swal.fire("Aviso", "Todo los campos son requeridos", "warning");
    } else {
      const url = base_url + "Home/registrar";
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          //console.log(this.responseText);
          const respuesta = JSON.parse(this.responseText);
          console.log(respuesta);
          if (respuesta.estado) {
            calendar.refetchEvents();
          }
          myModal.hide();
          Swal.fire("Aviso", respuesta.msg, respuesta.tipo);
        }
      };
    }
  });

  eliminar.addEventListener("click", function () {
    myModal.hide();
    Swal.fire({
      title: "¡Advertencia!",
      text: "Estas seguro de eliminar la Cita!!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "si, Eliminar!",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        const id = document.getElementById("id").value;
        const url = base_url + "Home/eliminar/" + id;
        const http = new XMLHttpRequest();
        http.open("GET", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const respuesta = JSON.parse(this.responseText);
            console.log(respuesta);
            if (respuesta.estado) {
              calendar.refetchEvents();
            }
            Swal.fire("Aviso", respuesta.msg, respuesta.tipo);
          }
        }
      }
    })
  });

  cancelar.addEventListener("click", function () {
    myModal.hide();
  });
});


