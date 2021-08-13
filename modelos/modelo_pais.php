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

function insertarPais($conexion, $datos){
    $query ="INSERT INTO country (country)
            VALUES ('{$datos['nombre']}')";

    $resultado = mysqli_query($conexion, $query);

    return $resultado;
}


function obtenerPaisPorId($conexion, $id) {
    $query = "SELECT * FROM country WHERE country_id = $id";

    $resultado = mysqli_query($conexion,$query);

    return $resultado;
}

function actualizarPais($conexion, $datos) {

    $query ="UPDATE country SET country ='{$datos['nombre']}' WHERE country_id = '{$datos['id']}'";

    $resultado = mysqli_query($conexion, $query);
    
    return $resultado;
}

function eliminarPais($conexion, $id) {

    $query ="DELETE FROM payment WHERE customer_id = $id";

    $resultado = mysqli_query($conexion, $query);

    $query ="DELETE FROM customer WHERE address_id = $id";

    $resultado = mysqli_query($conexion, $query);

    $query ="DELETE FROM address WHERE city_id = $id";

    $resultado = mysqli_query($conexion, $query);

    $query ="DELETE FROM city WHERE country_id = $id";

    $resultado = mysqli_query($conexion, $query);
    
    $query ="DELETE FROM country WHERE country_id = $id";

    $resultado = mysqli_query($conexion, $query);
    
    return $resultado;
}