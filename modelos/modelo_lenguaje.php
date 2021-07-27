<?php

require_once "conexion.php";

function obtenerLenguajes($conexion) {
    $query = "SELECT * FROM language";

    $resultado = mysqli_query($conexion,$query);

    return $resultado;
}

function obtenerLenguajesPorNombre($conexion, $nombre) {
    $query = "SELECT * FROM language WHERE name LIKE '%$nombre%'";

    $resultado = mysqli_query($conexion,$query);

    return $resultado;
}