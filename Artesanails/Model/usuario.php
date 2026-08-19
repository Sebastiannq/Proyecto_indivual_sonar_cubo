<?php
require_once __DIR__ . '/../config/conexion.php';

class Usuario {
    public static function registrar($nombre, $apellido, $tipo_identidad, $numero_identidad, $telefono, $correo, $password) {
        global $conexion;
        $nombre = $conexion->real_escape_string($nombre);
        $apellido = $conexion->real_escape_string($apellido);
        $tipo_identidad = $conexion->real_escape_string($tipo_identidad);
        $numero_identidad = $conexion->real_escape_string($numero_identidad);
        $telefono = $conexion->real_escape_string($telefono);
        $correo = $conexion->real_escape_string($correo);

        $sql = "INSERT INTO usuarios (nombre, apellido, tipo_identidad, numero_identidad, telefono, correo, password) 
                VALUES ('$nombre', '$apellido', '$tipo_identidad', '$numero_identidad', '$telefono', '$correo', '$password')";
        return $conexion->query($sql);
    }
}
?>