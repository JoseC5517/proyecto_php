<?php

require_once "conexion.php";

function obtenerActores($conexion) {
    $query = "SELECT * FROM actor";

    $resultado = mysqli_query($conexion,$query);

    return $resultado;
}

function obtenerActoresPorNombre($conexion, $nombre) {
    $query = "SELECT * FROM actor WHERE first_name LIKE '%$nombre%'";

    $resultado = mysqli_query($conexion,$query);

    return $resultado;
}