<?php
#incluir el modulo
require "modelos/modelo_actores.php";

$pagina = "Actores";

$actores = obtenerActores($conexion);



    if (isset($_GET['buscar'])) {
        $nombre = $_GET['nombre'] ?? "";
        $actores = obtenerActoresPorNombre($conexion, $nombre);
    
        #var_dump($actores);
    }
    
try{ 
    if (isset($_POST['guardar'])) {
        $nombre = $_POST['nombre'] ?? "";
        $apellido = $_POST['apellido'] ?? "";
        $id = $_POST['id'] ?? "";

        refrezcar("actores.php");

        # validar los datos
        if (empty($nombre)) {
            throw new Exception("El nombre no puede estar vacio.");
        }

        if (empty($apellido)) {
            throw new Exception("El apellido no puede estar vacio.");
        }
        
        $datos = compact('nombre', 'apellido');


        if (empty($id)){
            $insertado = insertarActor($conexion, $datos);
    
            if ($insertado) {
                $_SESSION['mensaje'] = 'Datos insertados correctamente';
            } 
            else {
                $_SESSION['mensaje'] = 'Datos NO INSERTADOS';
            }
        }
        else{
            $datos['id'] = $id;

            $actualizado = actualizarActor($conexion, $datos);

            if ($actualizado) {
                $_SESSION['mensaje'] = 'Datos actualizados correctamente';
            }
        }
    
#eliminar

    if(isset($_GET['eliminar'])){
        $id = $_GET['eliminar'];

        $eliminado = eliminarActor($conexion, $id);
    
        if ($eliminado) {
            $_SESSION['mensaje'] = 'Eliminado correctamente';
        }

    else{
        $_SESSION['mensaje'] = 'No se pudo eliminar';
    }
    refrezcar("actores.php");
    }
}

    if (isset($_GET['editar'])) {
        $id = $_GET['editar'];
    
        $result = obtenerActoresPorId($conexion, $id);

        $info = mysqli_fetch_assoc($result);
    }
    

}
catch(Exception $ex) {
    $_SESSION['mensaje'] = $ex->getMessage();
 
}


#incluir la vista
require_once 'vistas/vista_actores.php';
