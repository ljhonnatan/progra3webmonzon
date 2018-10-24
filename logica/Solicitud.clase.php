<?php

require_once '../capaDatos/Conexion.clase.php';

class Cita extends Conexion {
    
    public function registrarSolicitud($p_fecha, $p_det_sol) {
        try {
            $sql = "
                    select f_registrar_solicitud
                    (
                            :p_fecha,
                            :p_det_sol
                    ) as nc;
                ";
            
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_fecha", $p_fecha );
            $sentencia->bindParam(":p_det_sol", $p_det_sol );
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
}
