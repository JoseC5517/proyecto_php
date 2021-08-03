<?php
#incluir el modulo
require "modelos/modelo_actores.php";

$pagina = "Actores";

$actores = obtenerActores($conexion); 

if (isset($_GET['buscar'])) {
    $nombre = $_GET['nombre'] ?? "";
    $actores = obtenerActoresPorNombre($conexion, $nombre);
}

if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'] ?? "";
    $apellido = $_POST['apellido'] ?? "";
    
    $datos = [
        'nombre' => $nombre,
        'apellido' => $apellido
    ];
    
    $insertado = insertarActor($conexion, $datos);
    
    if ($insertado) {
        $_SESSION['mensaje'] = 'Datos insertados correctamente' ;
    }
    }
    
#incluir la vista
require_once 'vistas/vista_actores.php';