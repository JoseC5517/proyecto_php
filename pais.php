<?php
#incluir el modulo
require "modelos/modelo_pais.php";

$pagina = "Pais";

$paises = obtenerPaises($conexion); 

if (isset($_GET['buscar'])) {
    $nombre = $_GET['nombre'] ?? "";
    $paises = obtenerPaisesPorNombre($conexion, $nombre);
}

#incluir la vista
require_once 'vistas/vista_pais.php';