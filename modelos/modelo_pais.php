<?php

require_once "conexion.php";

function obtenerPaises($conexion) {
    $query = "SELECT * FROM country";

    $resultado = mysqli_query($conexion,$query);

    return $resultado;
}

function obtenerPaisesPorNombre($conexion, $nombre) {
    $query = "SELECT * FROM country WHERE country LIKE '%$nombre%'";

    $resultado = mysqli_query($conexion,$query);

    return $resultado;
}