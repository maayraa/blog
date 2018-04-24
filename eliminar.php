<?php session_start();

include 'config/dbase.php';
include 'config/funciones.php';

$conexion = conexion($bd_config);

$com = $_GET['com'];
$pub = $_GET['pub'];

$stm = $conexion->prepare("DELETE FROM comentarios WHERE id_com = :com");
$stm->execute([
    ':com'=>$com
]);

header('Location: '.RUTA.'vermas.view.php?pub='.$pub);

?> 