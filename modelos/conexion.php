<?php

#conectarnos a la base de datos
//forma simple
$host = "127.0.0.1";
$usuario = "root";
$contrasena = "";
$base_datos = "sakila";

$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

if (!$conexion){
    echo "<br> Hubo un error al conectarnos";
}else{
    // echo "conexion exitosa";
}