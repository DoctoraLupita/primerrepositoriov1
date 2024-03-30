<?php

// Datos de conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$nombre_bd = "login_register_db";

// Crear una conexión
$conexion = new mysqli($servidor, $usuario, $contrasena, $nombre_bd);


// Verificar la conexión

if($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Si la conexión es exitosa, puedes seguir ejecutando consultas o realizar otras operaciones con la base de datos
 
 ?>