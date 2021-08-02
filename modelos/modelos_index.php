<?php

require_once "conexion.php";

function obtenerActoresPorNombre($conexion, $nombre) {
    $query = "SELECT * FROM actor WHERE firt_name LIKE '%$nombre%'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function insertarActor($conexion, $datos) {
    $query ="INSERT INTO actor (first_name, last_name)
            VALUES ('{$datos['nombre']}', '{$datos['apellido']}')";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}


