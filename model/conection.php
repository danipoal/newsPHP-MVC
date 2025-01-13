<?php
    function createConection(){
        $database = "ilernoticias";
        $host = "localhost";
        $user = "root";
        $password = "";

        $conexion = mysqli_connect($host, $user, $password, $database);
        if(!$conexion){
            die("Error en la conexion" . mysqli_connect_error());
        }
        return $conexion;
    }

    function closeConection($conexion){
        mysqli_close($conexion);
    }
?>