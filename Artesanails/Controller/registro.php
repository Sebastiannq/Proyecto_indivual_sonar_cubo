<?php
include("../config/conexion.php");

if (isset($_POST['registrar'])) {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $apellido = $conexion->real_escape_string($_POST['apellido']);
    $tipo_identidad = $conexion->real_escape_string($_POST['tipo_identidad']);
    $numero_identidad = $conexion->real_escape_string($_POST['numero_identidad']);
    $telefono = $conexion->real_escape_string($_POST['telefono']);
    $correo = $conexion->real_escape_string($_POST['correo']);
    $password = $_POST['password'];

    $sql = "INSERT INTO usuarios (nombre, apellido, tipo_identidad, numero_identidad, telefono, correo, password) 
            VALUES ('$nombre', '$apellido', '$tipo_identidad', '$numero_identidad', '$telefono', '$correo', '$password')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: ../index.php?status=success");
    } else {
        header("Location: ../index.php?status=error");
    }
    exit();
}
?>