<?php session_start();

include 'config/dbase.php';
include 'config/funciones.php';

    $conexion = conexion($bd_config);
    if (isset($_SESSION['usuario'])) {
        $usuario = iniciarSesion('usuarios', $conexion); 
        if ($usuario['tipo_user'] == 1) {
            header('Location: '.RUTA.'inicio.view.php');
            // echo 1;
        }elseif ($usuario['tipo_user'] == 2) {
            header('Location: '.RUTA.'moderador.view.php');
        } else{
            header('Location: '.RUTA.'administrador.view.php');
            // echo 3;
        }
    } else {
        header('Location: '.RUTA.'index.view.php');
    }