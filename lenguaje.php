<?php
#incluir el modulo
require "modelos/modelo_lenguaje.php";

$pagina = "Lenguaje";

$lenguajes = obtenerLenguajes($conexion); 

if (isset($_GET['buscar'])) {
    $nombre = $_GET['nombre'] ?? "";
    $lenguajes = obtenerLenguajesPorNombre($conexion, $nombre);
}

#incluir la vista
require_once 'vistas/vista_lenguaje.php';