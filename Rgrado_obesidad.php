<?php

require 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $body = json_decode(file_get_contents("php://input"), true);

    // Actualizar 
    $retorno = funciones::Rgrado_obesidad (

        $body['nombre'],

        $body['riesgo']);

    if ($retorno!=-1) {

        $json_string = json_encode(array("estado" => 1,"mensaje" => "Creacion correcta"));

		echo $json_string;

    } else {

        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se registro"));

		echo $json_string;

    }

}

?>