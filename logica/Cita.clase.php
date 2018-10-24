<?php

require_once '../capaDatos/Conexion.clase.php';

class Cita extends Conexion {
    
    public function registrarCita($p_dni, $p_det_cit) {
        try {
            $sql = "
                    select f_registrar_cita
                    (
                            :p_dni,
                            :p_det_cit
                    ) as nc;
                ";
            
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_dni", $p_dni );
            $sentencia->bindParam(":p_det_cit", $p_det_cit );
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
}
