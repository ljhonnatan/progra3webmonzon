<?php

require_once '../logica/Cita.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'token.validar.php';

if (! isset($_POST["token"])){
    Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}

$token = $_POST["token"];

try {
    if (validarToken($token)){
        $dni = $_POST["dni"];
        $det_cit = $_POST["det_cit"];
        
        $objcit = new Cita();
        $resultado = $objcit->registrarCita($dni, $det_cit);
        
        Funciones::imprimeJSON(200, "", $resultado);
    }
} catch (Exception $exc) {
    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}
