<?php

require_once '../capaDatos/Conexion.clase.php';

class Pedido extends Conexion {
    
    public function registrarPedido($p_dni, $p_det_ped) {
        try {
            $sql = "
                    select f_registrar_pedido
                    (
                            :p_dni,
                            :p_det_ped
                    ) as np;
                ";
            
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_dni", $p_dni );
            $sentencia->bindParam(":p_det_ped", $p_det_ped );
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
}
