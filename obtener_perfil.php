<?php
/**
 * Obtiene el detalle de un alumno especificado por
 * su identificador "idalumno"
 */
require 'funciones.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id_usuario']) ){
        // Obtener parámetro usuario
        $parametro = $_GET['id_usuario'];
    
        // Tratar retorno
        $retorno = funciones::obtener_perfil($parametro);
        if ($retorno) {
            $usuario["estado"] = 1;		// cambio "1" a 1 porque no coge bien la cadena.
            $usuario["usuario"] = $retorno;
            // Enviar objeto json del alumno
            print json_encode($usuario);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '2',
                    'mensaje' => 'No se obtuvo el registro'
                )
            );
        }
    } else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'estado' => '3',
                'mensaje' => 'Se necesita un identificador'
            )
        );
    }
}
?>