<?php
$servidor = "localhost";
$usuario = "root";
$password = getenv('MYSQL_SECURE_PASSWORD') !== false ? getenv('MYSQL_SECURE_PASSWORD') : "";
$base_datos = "salsamentaria_db";

$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>