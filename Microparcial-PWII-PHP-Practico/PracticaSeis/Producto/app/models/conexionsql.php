<?php

$host = "localhost";
$db_usuario = "root";
$db_contrasena = "";
$db_nombre = "practica6";

function conectar_a_bd() {
    $conexion = new mysqli($GLOBALS['host'], $GLOBALS['db_usuario'], $GLOBALS['db_contrasena'], $GLOBALS['db_nombre']);
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    } else {
        echo "Conexión exitosa a la base de datos";
    }
    return $conexion;
}

?>
