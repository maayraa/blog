<?php
    include 'config/dbase.php';
    include 'config/funciones.php';
    $conexion = conexion($bd_config);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idpub = $_POST['id_pub'];
        $idcat = $_POST['id_cat'];
        $nom_user = $_POST['nom_user'];
        $titulo = utf8_encode($_POST['titulo']);
        $cont = utf8_encode($_POST['conte']);
        $fecha = $_POST['fecha'];
        $estatus = $_POST['status'];
       
        // VARIBLE PARA DAR MENSAJES DE ERROR
        $error = '';
        // $avatar = ;

        // VALIDA QUE LOS CAMPOS ESTEN LLENOS
        if (empty($idcat) || empty($nom_user) || empty($titulo) ) {
            $error = '<li class=error>Por favor rellene todos los campos</li>';
        } else {
            // PREPARA LA SENTENCIA SQL PARA VER QUE NO ESTE REGISTRADO UN USUARIO IGUAL
            
            $statement = $conexion->prepare('SELECT * FROM publicaciones WHERE titulo = :titulo LIMIT 1');
            $statement->execute([':titulo'=>$titulo]);
            $resultado = $statement->fetch();
            if ($resultado != false) {
                $error .= '<li class=error>Este titulo ya existe</li>';
            } 
         }
          // SI LA VARIABLE NO GUARDO NINGUN MENSAJE, PROSIGUE A GUARDAR LOS DATOS
        if ($error == '') {
            // PREPARA LA SENTENCIA SQL PARA GUARDAR LOS DATOS A LA TABLA PERFILES
            $statement = $conexion->prepare('INSERT INTO publicaciones (id_cat, nom_user, titulo, conte, fecha, status) VALUES(:id_cat, :nom_user, :titulo, :conte, :fecha, :status)');
            $statement->execute([
                ':id_cat'=>$idcat,
                ':nom_user'=>$nom_user,
                ':titulo'=>$titulo,
                ':conte'=>$cont,
                ':fecha'=>$fecha,
                ':status'=>$estatus
            ]);
            if ($statement == true) {
                $estado = 'Se Guardo Exitosamente!';
                echo $estado;
            }else{
                $estado = 'ERROR 404';
                // return require '../views/estado.view.php';
            }
        }
    }
    require './nuevapub.view.php';

?>          