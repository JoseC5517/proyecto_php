<?php
#incluir el modulo
require "modelos/modelo_actores.php";

$pagina = "Actores";

$actores = obtenerActores($conexion);

try{

    if (isset($_GET['buscar'])) {
        $nombre = $_GET['nombre'] ?? "";
        $actores = obtenerActoresPorNombre($conexion, $nombre);
    
        #var_dump($actores);
    }
    
    
    if (isset($_POST['guardar'])) {
        $nombre = $_POST['nombre'] ?? "";
        $apellido = $_POST['apellido'] ?? "";
    
        # validar los datos
        if (empty($nombre)) {
            throw new Exception("el nombre no puede estar vacio");
        }
    
    
    
        if (empty($apellido)) {
            throw new Exception("el apellido no puede estar vacio");
        }
        $datos = compact('nombre', 'apellido');
    
        $insertado = insertarActor($conexion, $datos);
    
        if ($insertado) {
            $_SESSION['mensaje'] = 'Datos insertados correctamente';
        } else {
            $_SESSION['mensaje'] = 'Datos NO INSERTADOS';
        }
    }
    
    if (isset($_GET['editar'])) {
        $id = $_GET['editar'];
    
        $resut = obtenerActoresPorId($conexion, $id);
    
        $info = mysqli_fetch_assoc($result);
    }
    

} catch(Exception $ex) {
$_SESSION['mensaje'] = $ex->getMessage();
 
}


#incluir la vista
require_once 'vistas/vista_actores.php';
