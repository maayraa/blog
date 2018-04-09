<?php session_start();
    include_once './config/dbase.php';
    include_once './config/funciones.php';

    $conexion = conexion($bd_config);
    $pub = $_GET['pub'];
    $_SESSION['id_pub'] = $pub;
    $pubs = pubs($pub, $conexion);

    // echo $pubs['titulo'];
    
    require_once './vermas.view.php';