<?php
#incluir el modulo
require "modelos/modelo_lenguaje.php";

$pagina = "Lenguaje";

$lenguajes = obtenerLenguajes($conexion); 

if (isset($_GET['buscar'])) {
    $nombre = $_GET['nombre'] ?? "";
    $lenguajes = obtenerLenguajesPorNombre($conexion, $nombre);
}

if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'] ?? "";
    
    $datos = compact('nombre');
    
    $insertado = insertarLenguaje($conexion, $datos);
    
    if ($insertado) {
        $_SESSION['mensaje'] = 'Datos insertados correctamente' ;
    } else {
        $_SESSION['mensaje'] = 'Datos NO INSERTADOS' ;
    }
    }

#incluir la vista
require_once 'vistas/vista_lenguaje.php';