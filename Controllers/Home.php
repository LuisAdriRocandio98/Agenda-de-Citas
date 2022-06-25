<?php
class Home extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->views->getView($this, 'index');
    }

    public function registrar(){
        if(empty($_POST['title']) || empty($_POST['start']) || empty($_POST['color']) || empty($_POST['nombres']) || empty($_POST['apellidos']) || empty($_POST['hora'])){
            $mensaje = array('msg' => 'Todo los campos son requeridos', 'estado' => false, 'tipo' => 'warning');
        }else{
            $evento = $_POST['title'];
            $fecha = $_POST['start'];
            $color = $_POST['color'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $hora = $_POST['hora'];
            $id = $_POST['id'];

            if($id == ''){
                $respuesta = $this->model->registrar($evento, $nombres, $apellidos, $fecha, $hora, $color);
                if($respuesta == 1){
                $mensaje = array('msg' => 'Cita Guardada Exitosamente', 'estado' => true, 'tipo' => 'success');
                }else{
                $mensaje = array('msg' => 'Error no se guardo cita, intenta de nuevo ', 'estado' => false, 'tipo' => 'error');
                }
            }else{
                $respuesta = $this->model->modificar($evento, $nombres, $apellidos, $fecha, $hora, $color, $id);
                if($respuesta == 1){
                $mensaje = array('msg' => 'cita Modificada', 'estado' => true, 'tipo' => 'success');
                }else{
                $mensaje = array('msg' => 'Error no se modificar la cita, intenta de nuevo ', 'estado' => false, 'tipo' => 'error');
                }
            }
            

            echo json_encode($mensaje);
            die();
        }
    }

    public function listar(){
        $data = $this->model->listarEventos();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar($id){
        $data = $this->model->eliminar($id);
        if($data == 1){
            $mensaje = array('msg' => 'cita Eliminada', 'estado' => true, 'tipo' => 'success');
        }else{
            $mensaje = array('msg' => 'Error no se pudo eliminar la cita, intenta de nuevo ', 'estado' => false, 'tipo' => 'error');
        }
        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function drop(){
        $fecha = $_POST['fecha'];
        $id = $_POST['id'];
        $data = $this->model->drop($fecha, $id);
        if($data == 1){
            $mensaje = array('msg' => 'cita Modificada', 'estado' => true, 'tipo' => 'success');
        }else{
            $mensaje = array('msg' => 'Error no se pudo modificar la cita, intenta de nuevo ', 'estado' => false, 'tipo' => 'error');
        }
         echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
         die();
    }


}
