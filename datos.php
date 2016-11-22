<?php

/**

 * Obtiene todas las alumnos de la base de datos

 */

require 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET

    $usuarios = funciones::getAll();

    if ($usuarios) {

        $datos["estado"] = 1;

        $datos["usuarios"] = $usuarios;

        print json_encode($datos);

    } else {

        print json_encode(array(

            "estado" => 2,

            "mensaje" => "Ha ocurrido un error"

        ));

    }

}

?>