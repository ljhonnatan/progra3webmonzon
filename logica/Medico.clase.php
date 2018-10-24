<?php

require_once '../capaDatos/Conexion.clase.php';

class Medico extends Conexion{
    private $codigo_medico;
    private $nombre;
    private $especialidad;
    private $horario_atencion_;
    function getCodigo_medico() {
        return $this->codigo_medico;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEspecialidad() {
        return $this->especialidad;
    }

    function getHorario_atencion_() {
        return $this->horario_atencion_;
    }

    function setCodigo_medico($codigo_medico) {
        $this->codigo_medico = $codigo_medico;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEspecialidad($especialidad) {
        $this->especialidad = $especialidad;
    }

    function setHorario_atencion_($horario_atencion_) {
        $this->horario_atencion_ = $horario_atencion_;
    }

public function listar() {
     try {
    $sql = "select * from medico order by 2";
     $sentencia = $this->dblink->prepare($sql);
     $sentencia->execute();
     $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
     return $resultado;

     } catch (Exception $exc) {
       throw $exc;
}
 }
 
 public function obtenerFoto($id) {
        $foto = "../imagenes-producto/".$id;

        if (file_exists( $foto . ".png" )){
            $foto = $foto . ".png";

        }else if (file_exists( $foto . ".PNG" )){
            $foto = $foto . ".PNG";

        }else if (file_exists( $foto . ".jpg" )){
            $foto = $foto . ".jpg";

        }else if (file_exists( $foto . ".JPG" )){
            $foto = $foto . ".JPG";

        }else{
            $foto = "none";
        }
        
        if ($foto == "none"){
            return $foto;
        }else{
            return Funciones::$DIRECCION_WEB_SERVICE . $foto;
        }
        
    }

}
