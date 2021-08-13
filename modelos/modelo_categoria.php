<?php

require_once "conexion.php";

function obtenerCategorias($conexion) {
    $query = "SELECT * FROM category";

    $resultado = mysqli_query($conexion,$query);

    return $resultado;
}

function obtenerCategoriasPorNombre($conexion, $nombre) {
    $query = "SELECT * FROM category WHERE name LIKE '%$nombre%'";

    $resultado = mysqli_query($conexion,$query);

    return $resultado;
}


function insertarCategoria($conexion, $datos){
    $query ="INSERT INTO category (name)
            VALUES ('{$datos['nombre']}')";

    $resultado = mysqli_query($conexion, $query);

    return $resultado;
}

function obtenerCategoriasPorId($conexion, $id) {
    $query = "SELECT * FROM category WHERE category_id = $id";

    $resultado = mysqli_query($conexion,$query);

    return $resultado;
}

function actualizarCategoria($conexion, $datos) {
    $query ="UPDATE category SET name='{$datos['nombre']}' WHERE category_id = '{$datos['id']}'";

    $resultado = mysqli_query($conexion, $query);
    
    return $resultado;
}

function eliminarCategoria($conexion, $id) {

    $query ="DELETE FROM film_category WHERE category_id = $id";

    $resultado = mysqli_query($conexion, $query);
    
    $query ="DELETE FROM category WHERE category_id = $id";

    $resultado = mysqli_query($conexion, $query);
    
    return $resultado;
}