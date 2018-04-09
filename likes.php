<?php session_start();
    include 'config/dbase.php';
    include 'config/funciones.php';

    $conexion = conexion($bd_config);

    if (isset($_POST['like'])) {
        $statement = $conexion->prepare("INSERT INTO likes(id_pub, id_usuario, megusta) VALUES(:idpub, :iduser, :lk)");
        $statement->execute([
            ':idpub'=>$_POST['idpub'],
            ':iduser'=>$_SESSION['id_usuario'],
            ':lk'=>'1'
        ]);
        echo BACK;
    } elseif (isset($_POST['dontlike'])) {
        $statement = $conexion->prepare("DELETE FROM likes WHERE id_pub = :idpub AND id_usuario = :id_user");
        $statement->execute([
            ':idpub'=>$_POST['idpub'],
            ':id_user'=>$_SESSION['id_usuario']
        ]);

        echo BACK;
    }