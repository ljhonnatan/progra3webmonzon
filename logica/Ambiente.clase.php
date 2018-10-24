<?php

require_once '../capaDatos/Conexion.clase.php';

class Ambiente extends Conexion{
   private $codigo_ambiente;
    private $capacidad;
    private $tipo;
    private $estado;
    function getCodigo_ambiente() {
        return $this->codigo_ambiente;
    }

    function getCapacidad() {
        return $this->capacidad;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getEstado() {
        return $this->estado;
    }

    function setCodigo_ambiente($codigo_ambiente) {
        $this->codigo_ambiente = $codigo_ambiente;
    }

    function setCapacidad($capacidad) {
        $this->capacidad = $capacidad;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


   
public function listar() {
     try {
    $sql = "select * from ambiente where estado = 'D' order by 2";
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
