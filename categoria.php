<?php
#incluir el modulo
require "modelos/modelo_categoria.php";

$pagina = "Categorias";

$categorias = obtenerCategorias($conexion); 


    if (isset($_GET['buscar'])) {
        $nombre = $_GET['nombre'] ?? "";
        $categorias = obtenerCategoriasPorNombre($conexion, $nombre);
    }


try{
    if (isset($_POST['guardar'])) {
        $nombre = $_POST['nombre'] ?? "";
        $id = $_POST['id'] ?? "";
    refrezcar("categoria.php");
    # validar los datos
    if (empty($nombre)) {
        throw new Exception("El nombre no puede estar vacio.");
    }
        
        $datos = compact('nombre');


        if (empty($id)){
            $insertado = insertarCategoria($conexion, $datos);
    
            if ($insertado) {
                $_SESSION['mensaje'] = 'Datos insertados correctamente';
            } 
            else {
                $_SESSION['mensaje'] = 'Datos NO INSERTADOS';
            }
        }
        else{
            $datos['id'] = $id;

            $actualizado = actualizarCategoria($conexion, $datos);

            if ($actualizado) {
                $_SESSION['mensaje'] = 'Datos actualizados correctamente';
            }
        }
    }


        if(isset($_GET['eliminar'])){
            $id = $_GET['eliminar'];
    
            $eliminar = eliminarCategoria($conexion, $id);
        
        if ($eliminar) {
            $_SESSION['mensaje'] = 'Eliminado correctamente';
        }
    
        else{
            $_SESSION['mensaje'] = 'No se pudo eliminar';
        }
        refrezcar("categoria.php");
    }
    

    if (isset($_GET['editar'])) {

        $id = $_GET['editar'];
    
        $result = obtenerCategoriasPorId($conexion, $id);

        $info = mysqli_fetch_assoc($result);
    }
    
}



catch(Exception $ex) {
    $_SESSION['mensaje'] = $ex->getMessage();
    }

#incluir la vista
require_once 'vistas/vista_categoria.php';