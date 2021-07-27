<?php
#incluir el modulo
require "modelos/modelo_actores.php";

$pagina = "Actores";

$actores = obtenerActores($conexion); 

if (isset($_GET['buscar'])) {
    $nombre = $_GET['nombre'] ?? "";
    $actores = obtenerActoresPorNombre($conexion, $nombre);
}
#incluir la vista
require_once 'vistas/vista_actores.php';