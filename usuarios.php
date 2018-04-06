<?php
include 'config/dbase.php';
include 'config/funciones.php';
$conexion = conexion($bd_config);

	$statement = $conexion->prepare("SELECT * FROM usuarios");
    $statement->execute();
    $usuario =$statement;


   
    