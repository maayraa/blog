<?php session_start();
    include_once './config/dbase.php';
    include_once './config/funciones.php';

    $conexion = conexion($bd_config);

    if($_SERVER['REQUEST METHOD']== 'POST'){
        $idpub= $_POST['id_pub'];
       $statement =$conexion->prepare("INSERT INTO etiqueta(id_pub)VALUES(:id_pub)");
       $statement->prepare([
           ':id_pub' => $idpub['id_pub'];
       ]);
       header('Location: '.RUTA.'nuevapub.php?pub='.$_SESSION['id_pub']);
    }