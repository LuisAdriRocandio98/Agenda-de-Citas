<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url; ?>Assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>Assets/css/main.min.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>Assets/css/style.css" rel="stylesheet">

    <title>Agenda de Citas</title>
  </head>
  <body>

   <div class="container">
      <h2>Agendas de citas</h2>
      <div id="calendar"></div>
   </div>
    
    <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-warning">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              
            </button>
          </div>

          <form id="formulario">
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="hidden" id="id" name="id">
                <input type="text" class="form-control" id="title" name="title">
                <label for="title" class="form-label">Actividad</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombres" name="nombres">
                <label for="nombres" class="form-label">Nombre</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="apellidos" name="apellidos">
                <label for="apellidos" class="form-label">Apellido</label>
              </div>
              <div class="form-floating mb-3">
                <input type="date" class="form-control" id="start" name="start">
                <label for="start" class="form-label">Fecha</label>
              </div>
              <div class="form-floating mb-3">
                <input type="time" class="form-control" id="hora" name="hora">
                <label for="hora" class="form-label">Hora</label>
              </div>
              <div class="form-floating mb-3">
                <input type="color" class="form-control" id="color" name="color">
                <label for="color" class="form-label">Color</label>
              </div>
            </div>
            <div class="modal-footer">
               <button class="btn btn-warning" type="button" id="btnCancelar">Cancelar</button>
               <button class="btn btn-danger" type="button" id="btnEliminar">Eliminar</button>
               <button class="btn btn-success" id="btnAccion" type="submit">Registrar Actividad</button>
            </div>
          </form>
           
        </div>
      </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/main.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/moment.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/es.js"></script>
    <script>
       const base_url = '<?php echo base_url; ?>';
    </script>
    <script src="<?php echo base_url; ?>Assets/js/app.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>