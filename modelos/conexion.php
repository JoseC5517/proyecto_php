<?php

#conectarnos a la base de datos
//forma simple
$host = "127.0.0.1";
$usuario = "root";
$contrasena = "";
$base_datos = "sakila";



//Valores de la base de datos 000webhost
//editar solamente desde 000webhost


if ($_SERVER['SERVER_NAME'] == 'xxxxxxx.000webhostapp.com'){
    $host = "localhost";
    $usuario = "xxx";
    $contrasena = "xxx";
    $base_datos = "xxx";
}



$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

if (!$conexion){
    echo "<br> Hubo un error al conectarnos";
}else{
    // echo "conexion exitosa";
}

function refrezcar($nombrepagina){
    header("location: $nombrepagina", true, 303);
}