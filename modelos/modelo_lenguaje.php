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

function insertarLenguaje($conexion, $datos){
    $query ="INSERT INTO language (name)
            VALUES ('{$datos['nombre']}')";

    $resultado = mysqli_query($conexion, $query);

    return $resultado;
}

function obtenerLenguajePorId($conexion, $id) {
    $query = "SELECT * FROM language WHERE language_id = $id";

    $resultado = mysqli_query($conexion,$query);

    return $resultado;
}

function actualizarLenguaje($conexion, $datos) {
    $query ="UPDATE language SET name='{$datos['nombre']}' WHERE language_id = '{$datos['id']}'";

    $resultado = mysqli_query($conexion, $query);
    
    return $resultado;
}

function eliminarLenguaje($conexion, $id) {
    
    $query ="DELETE FROM language WHERE language_id = $id";

    $resultado = mysqli_query($conexion, $query);
    
    return $resultado;
}