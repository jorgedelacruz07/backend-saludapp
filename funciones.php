<?php

/**

 * Representa el la estructura de las Alumnoss

 * almacenadas en la base de datos

 */

require 'Database.php';

class funciones

{

    function __construct()

    {

    }

    

    public static function getAll()

    {

        $consulta = "SELECT * FROM usuario";

        try {

            // Preparar sentencia

            $comando = Database::getInstance()->getDb()->prepare($consulta);

            // Ejecutar sentencia preparada

            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {

            return false;

        }

    }


    public static function login ( $id_usuario, $password )

    {

        // Consulta de la tabla Alumnos

        $consulta = "SELECT u.id_usuario, u.nombre, u.apellido, u.dirección, u.interes, s.nombre AS sexo

                        FROM usuario u JOIN sexo s ON u.id_sexo=s.id_sexo

                             WHERE u.id_usuario = ? and u.password= ? ";

        try {

            // Preparar sentencia

            $comando = Database::getInstance()->getDb()->prepare($consulta);

            // Ejecutar sentencia preparadas

            $comando->execute(array($id_usuario, $password));

            // Capturar primera fila del resultado

            $row = $comando->fetch(PDO::FETCH_ASSOC);

            return $row;

        } catch (PDOException $e) {

            // Aquí puedes clasificar el error dependiendo de la excepción

            // para presentarlo en la respuesta Json

            return -1;

        }

    }



    public static function crear_cuenta ( $id_usuario, $nombre,  $direccion, $id_sexo, $interes, $apellido, $password)
    {   
        try{
        // Creando consulta 
            $consulta = "INSERT INTO usuario ("."id_usuario,"." nombre,"." direccion,"." id_sexo,"." interes,"." apellido,"." password)"." VALUES (?,?,?,?,?,?,?)";
            
            // Preparar la sentencia
            $cmd = Database::getInstance()->getDb()->prepare($consulta);
            // Relacionar y ejecutar la sentencia
             $cmd->bindParam(1, $id_usuario);
             $cmd->bindParam(2, $nombre);
             $cmd->bindParam(3, $direccion);
             $cmd->bindParam(4,  $id_sexo);
             $cmd->bindParam(5,  $interes);
             $cmd->bindParam(6, $apellido);
             $cmd->bindParam(7,  $password);
            $cmd->execute();
              return $cmd;
        } catch (PDOException $e) {

            return -1;
        }
    }

    public static function lista_alimentos()

    {

        $consulta = "SELECT * FROM alimento";

        try {

            // Preparar sentencia

            $comando = Database::getInstance()->getDb()->prepare($consulta);

            // Ejecutar sentencia preparada

            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {

            return false;

        }

    }

    public static function registrar_alimentos ( $id_usuario, $id_alimento,  $cantidad, $proteinas, $hidratos_carbono, $grasa, $potasio, $sodio, $vitaminac, $hierro)
    {   
        try{
        // Creando consulta 
            $consulta = "INSERT INTO usuario_alimento ("."id_usuario,"." id_alimento,"." cantidad,"." proteinas,"." hidratos_carbono,"." grasa,"."potasio,"."sodio,"."vitaminac,"."hierro)"." VALUES (?,?,?,?,?,?,?,?,?,?)";
            
            // Preparar la sentencia
            $cmd = Database::getInstance()->getDb()->prepare($consulta);
            // Relacionar y ejecutar la sentencia
             $cmd->bindParam(1, $id_usuario);
             $cmd->bindParam(2, $id_alimento);
             $cmd->bindParam(3, $cantidad);
             $cmd->bindParam(4, $proteinas);
             $cmd->bindParam(5, $hidratos_carbono);
             $cmd->bindParam(6, $grasa);
             $cmd->bindParam(7, $potasio);
             $cmd->bindParam(8, $sodio);
             $cmd->bindParam(9, $vitaminac);
             $cmd->bindParam(10, $hierro);
            $cmd->execute();
              return $cmd;
        } catch (PDOException $e) {

            return -1;
        }
    }

    public static function registrar_obesidad ( $id_usuario, $id_grado, $imc, $talla, $peso)
    {   
        try{
        // Creando consulta 
            $consulta = "INSERT INTO obesidad ("."id_usuario,"." id_Grado,"." imc,"." talla,"." peso)"." VALUES (?,?,?,?,?)";
            
            // Preparar la sentencia
            $cmd = Database::getInstance()->getDb()->prepare($consulta);
            // Relacionar y ejecutar la sentencia
             $cmd->bindParam(1, $id_usuario);
             $cmd->bindParam(2, $id_grado);
             $cmd->bindParam(3, $imc);
             $cmd->bindParam(4, $talla);
             $cmd->bindParam(5, $peso);
            $cmd->execute();
              return $cmd;
        } catch (PDOException $e) {

            return -1;
        }
    }

    public static function Rgrado_obesidad ( $nombre, $riesgo)
    {   
        try{
        // Creando consulta 
            $consulta = "INSERT INTO grado_obesidad ("."nombre,"." riesgo)"." VALUES (?,?)";
            
            // Preparar la sentencia
            $cmd = Database::getInstance()->getDb()->prepare($consulta);
            // Relacionar y ejecutar la sentencia
             $cmd->bindParam(1,$nombre);
             $cmd->bindParam(2, $riesgo);
   
            $cmd->execute();
              return $cmd;
        } catch (PDOException $e) {

            return -1;
        }
    }

}

?>