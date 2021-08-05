<?php
#incluir el modulo
require "modelos/modelo_categoria.php";

$pagina = "Categoria";

$categorias = obtenerCategorias($conexion); 

if (isset($_GET['buscar'])) {
    $nombre = $_GET['nombre'] ?? "";
    $categorias = obtenerCategoriasPorNombre($conexion, $nombre);
}

if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'] ?? "";
    
    $datos = compact('nombre');
    
    $insertado = insertarCategoria($conexion, $datos);
    
    if ($insertado) {
        $_SESSION['mensaje'] = 'Datos insertados correctamente' ;
    } else {
        $_SESSION['mensaje'] = 'Datos NO INSERTADOS' ;
    }
    }

#incluir la vista
require_once 'vistas/vista_categoria.php';