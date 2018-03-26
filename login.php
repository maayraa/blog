<?php session_start();

    include 'config/dbase.php';
    include 'config/funciones.php';

    $error = '';
    $conexion = conexion($bd_config);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $query = $conexion->prepare('SELECT * FROM usuarios WHERE nom_user = :nom_user AND password = :pass');
        $query->execute([
            ':nom_user' => $user,
            ':pass' => $pass
        ]);
        $resultado = $query->FETCH();
        if ($resultado !== false) {
            $_SESSION['usuario'] = $user;
            header('Location: '.RUTA.'validacion.php');
        }
    }
