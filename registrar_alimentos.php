<?php

/**

 * Actualiza un alumno especificado por su identificador

 */

require 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json

    $body = json_decode(file_get_contents("php://input"), true);

    // Actualizar 
    $retorno = funciones::registrar_alimentos (

        $body['id_usuario'],

        $body['id_alimento'],

        $body['cantidad'],

        $body['proteinas'],

        $body['hidratos_carbono'],

        $body['grasa'],

        $body['sodio'],

        $body['vitaminac'],

        $body['hierro']);

    if ($retorno!=-1) {

        $json_string = json_encode(array("estado" => 1,"mensaje" => "Creacion correcta"));

		echo $json_string;

    } else {

        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se registro"));

		echo $json_string;

    }

}

?>