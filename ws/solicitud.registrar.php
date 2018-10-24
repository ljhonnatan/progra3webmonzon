<?php

require_once '../logica/Solicitud.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'token.validar.php';

if (! isset($_POST["token"])){
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}

$token = $_POST["token"];

try {
    if (validarToken($token)){
        $fecha = $_POST["fecha"];
        $det_ped = $_POST["det_sol"];
        
        $objPed = new Cita();
        $resultado = $objPed->registrarSolicitud($fecha, $det_sol);
        
        Funciones::imprimeJSON(200, "", $resultado);
    }
} catch (Exception $exc) {
    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}


