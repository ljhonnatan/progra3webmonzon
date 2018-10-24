<?php

require_once '../capaDatos/Conexion.clase.php';

class Planta extends Conexion{
    private $codigo_planta;
    private $nombre;
    private $fecha;
    private $hora;
    private $descripcion;
    function getCodigo_planta() {
        return $this->codigo_planta;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setCodigo_planta($codigo_planta) {
        $this->codigo_planta = $codigo_planta;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

public function listar() {
     try {
    $sql = "select * from planta order by 2";
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
