<?php
#incluir el modulo
require "modelos/modelo_pais.php";

$pagina = "Paises";

$paises = obtenerPaises($conexion); 

try{
    if (isset($_GET['buscar'])) {
        $nombre = $_GET['nombre'] ?? "";
        $paises = obtenerPaisesPorNombre($conexion, $nombre);
    }
    
    if (isset($_POST['guardar'])) {
        $nombre = $_POST['nombre'] ?? "";
    # validar los datos
    if (empty($nombre)) {
        throw new Exception("El nombre no puede estar vacio.");
    }
        
        $datos = compact('nombre');
        
        $insertado = insertarPais($conexion, $datos);
        
        if ($insertado) {
            $_SESSION['mensaje'] = 'Datos insertados correctamente' ;
        } else {
            $_SESSION['mensaje'] = 'Datos NO INSERTADOS' ;
        }
        }
    
}


    catch(Exception $ex) {
        $_SESSION['mensaje'] = $ex->getMessage();
        }
#incluir la vista
require_once 'vistas/vista_pais.php';