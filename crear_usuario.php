<?php

/**

 * Actualiza un alumno especificado por su identificador

 */

require 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json

    $body = json_decode(file_get_contents("php://input"), true);

    // Actualizar 
    $retorno = funciones::crear_cuenta(

        $body['id_usuario'],

        $body['nombre'],

        $body['direccion'],

        $body['id_sexo'],

        $body['interes'],

        $body['apellido'],

        $body['password']);

    if ($retorno!=-1) {

        $json_string = json_encode(array("estado" => 1,"mensaje" => "Creacion correcta"));

		echo $json_string;

    } else {

        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se creo el registro"));

		echo $json_string;

    }

}

?>