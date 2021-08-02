<?php
require_once "modelos/modelos_index.php";

$pagina = "WikiSalami";



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


require_once "vistas/vistas_index.php";