<?php
class HomeModel extends Query{
    public function __construct()
    {
        parent::__construct();
    }

    public function registrar($evento, $nombres, $apellidos, $fecha, $hora, $color){
        $sql = 'INSERT INTO evento (title, nombres, apellidos, start, hora, color) VALUES (?,?,?,?,?,?)';
        $array = array($evento, $nombres, $apellidos, $fecha, $hora, $color);
        $data = $this->save($sql, $array);
        if($data == 1){
            $msg = 1;
        }else{
            $msg = 0; 
        }
        return  $msg;
    }

    public function listarEventos(){
        $sql = "SELECT * FROM evento";
        return $this->selectAll($sql);
    }

    public function modificar($evento, $nombres, $apellidos, $fecha, $hora, $color, $id){
        $sql = 'UPDATE evento SET title=?, nombres=?, apellidos=?, start=?, hora=?, color=? WHERE id=?';
        $array = array($evento, $nombres, $apellidos, $fecha, $hora, $color, $id);
        $data = $this->save($sql, $array);
        if($data == 1){
            $msg = 1;
        }else{
            $msg = 0; 
        }
        return  $msg;
    }

    public function eliminar($id){
        $sql = 'DELETE FROM evento WHERE id=?';
        $array = array($id);
        $data = $this->save($sql, $array);
        if($data == 1){
            $msg = 1;
        }else{
            $msg = 0; 
        }
        return  $msg;
    }

    public function drop($fecha, $id){
        $sql = 'UPDATE evento SET start=? WHERE id=?';
        $array = array($fecha, $id);
        $data = $this->save($sql, $array);
        if($data == 1){
            $msg = 1;
        }else{
            $msg = 0; 
        }
        return  $msg;
    }
}

?>