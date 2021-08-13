<?php
#incluir el modulo
require "modelos/modelo_pais.php";

$pagina = "Paises";

$paises = obtenerPaises($conexion); 


    if (isset($_GET['buscar'])) {
        $nombre = $_GET['nombre'] ?? "";
        $paises = obtenerPaisesPorNombre($conexion, $nombre);
    }


try{
    if (isset($_POST['guardar'])) {
        $nombre = $_POST['nombre'] ?? "";
        $id = $_POST['id'] ?? "";
        refrezcar("pais.php");


    # validar los datos
    if (empty($nombre)) {
        throw new Exception("El nombre no puede estar vacio.");
    }
        
        $datos = compact('nombre');


        if (empty($id)){
            $insertado = insertarPais($conexion, $datos);
        
            if ($insertado) {
                $_SESSION['mensaje'] = 'Datos insertados correctamente' ;
            } else {
                $_SESSION['mensaje'] = 'Datos NO INSERTADOS' ;
            }
            }
        


        else{
            $datos['id'] = $id;

            $actualizado = actualizarPais($conexion, $datos);

            if ($actualizado) {
                $_SESSION['mensaje'] = 'Datos actualizados correctamente';
            }
        }
    }
    


    if(isset($_GET['eliminar'])){
        $id = $_GET['eliminar'];

        $eliminar = eliminarPais($conexion, $id);
    
    if ($eliminar) {
        $_SESSION['mensaje'] = 'Eliminado correctamente';
    }

    else{
        $_SESSION['mensaje'] = 'No se pudo eliminar';
    }
    refrezcar("pais.php");

}

if (isset($_GET['editar'])) {

    $id = $_GET['editar'];

    $result = obtenerPaisPorId($conexion, $id);

    $info = mysqli_fetch_assoc($result);
}



}catch(Exception $ex) {
        $_SESSION['mensaje'] = $ex->getMessage();
        }
#incluir la vista
require_once 'vistas/vista_pais.php';