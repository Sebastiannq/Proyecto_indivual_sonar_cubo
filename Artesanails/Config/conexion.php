<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "salsamentaria_db";

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>