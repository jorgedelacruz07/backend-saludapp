<?php

require 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET

    $lista = funciones::lista_alimentos();
    
    if ($lista) {

        $datos["estado"] = 1;

        $datos["alimentos"] = $lista;

        print json_encode($datos);

    } else {

        print json_encode(array(

            "estado" => 2,

            "mensaje" => "Ha ocurrido un error"

        ));

    }

}

?>