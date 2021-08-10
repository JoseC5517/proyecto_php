<?php
#incluir el modulo
require "modelos/modelo_pais.php";

$pagina = "Paises";

$paises = obtenerPaises($conexion); 

if (isset($_GET['buscar'])) {
    $nombre = $_GET['nombre'] ?? "";
    $paises = obtenerPaisesPorNombre($conexion, $nombre);
}

if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'] ?? "";
    
    $datos = compact('nombre');
    
    $insertado = insertarPais($conexion, $datos);
    
    if ($insertado) {
        $_SESSION['mensaje'] = 'Datos insertados correctamente' ;
    } else {
        $_SESSION['mensaje'] = 'Datos NO INSERTADOS' ;
    }
    }
#incluir la vista
require_once 'vistas/vista_pais.php';