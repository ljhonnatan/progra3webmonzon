<?php

require_once '../logica/Medico.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'token.validar.php';

if (! isset($_POST["token"])){
   Funciones::imprimeJSON(500, "Debe especificar un token", "");
    exit();
}

$token = $_POST["token"];

try {
    if(validarToken($token));
        //si devuelve true, quiere decir que el token es valido
    $objpro = new Medico();
    $resultado = $objpro->listar();
    
    for ($i = 0; $i < count($resultado); $i++) {
        $id = $resultado[$i]["codigo_medico"];
        $foto = $objpro->obtenerFoto($id);
        $resultado[$i]["foto"] = $foto;
        
    }
    
    Funciones::imprimeJSON(200, "", $resultado);
    
} catch (Exception $exc) {
    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}