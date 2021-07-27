<?php
#incluir el modulo
require "modelos/modelo_categoria.php";

$pagina = "Categoria";

$categorias = obtenerCategorias($conexion); 

if (isset($_GET['buscar'])) {
    $nombre = $_GET['nombre'] ?? "";
    $categorias = obtenerCategoriasPorNombre($conexion, $nombre);
}

#incluir la vista
require_once 'vistas/vista_categoria.php';