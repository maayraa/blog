<?php
    include 'config/dbase.php';
    include 'config/funciones.php';
    $conexion = conexion($bd_config);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['user'];
        $nombre = $_POST['nom'];
        $apellidos = $_POST['ape'];
        $correo = $_POST['email'];
        $password = $_POST['pass'];

        // VARIBLE PARA DAR MENSAJES DE ERROR
        $error = '';
        // $avatar = ;

        // VALIDA QUE LOS CAMPOS ESTEN LLENOS
        if (empty($nombre) || empty($apellidos) || empty($correo) ) {
            $error = '<li class=error>Por favor rellene todos los campos</li>';
        } else {
            // PREPARA LA SENTENCIA SQL PARA VER QUE NO ESTE REGISTRADO UN USUARIO IGUAL
            
            $statement = $conexion->prepare('SELECT * FROM usuarios WHERE nom_user = :nom_user LIMIT 1');
            $statement->execute([':nom_user'=>$usuario]);
            $resultado = $statement->fetch();
            if ($resultado != false) {
                $error .= '<li class=error>Este usuario ya existe</li>';
            } else{
                 // PREPARA LA SENTENCIA SQL PARA VER QUE NO ESTE REGISTRADO UN USUARIO IGUAL

                 $statement = $conexion->prepare('SELECT * FROM perfil WHERE correo = :correo LIMIT 1');
                 $statement->execute([':correo'=>$correo]);
                 $resultado = $statement->fetch();
                 if ($resultado != false) {
                     $error .= '<li class=error>Este correo ya esta registrado</li>';
                 }
             }
         }
          // SI LA VARIABLE NO GUARDO NINGUN MENSAJE, PROSIGUE A GUARDAR LOS DATOS
        if ($error == '') {
            // PREPARA LA SENTENCIA SQL PARA GUARDAR LOS DATOS A LA TABLA PERFILES
            $statement = $conexion->prepare('INSERT INTO perfil (id_perfil, nombre, ape, correo) VALUES(null, :nombre, :ape, :correo)');
            $statement->execute([
                ':nombre'=>$nombre,
                ':ape'=>$apellidos,
                ':correo'=>$correo
            ]);
            if ($statement == true) {
                // PREPARA LA SENTENCIA SQL PARA GUARDAR LOS DATOS A LA TABLA USUARIOS
                $perfil = getPerfiles($correo, $conexion);
                $id = $perfil['id_perfil'];
                $statement = $conexion->prepare('INSERT INTO usuarios (id_usuario, nom_user, password, tipo_user, status, id_perfil) VALUES(null, :usuario, :password, :tipo, :status, :id)');
                $statement->execute([
                    ':usuario'=>$usuario,
                    ':password'=>$password,
                    ':tipo'=>'1',
                    ':status'=>'activo',
                    ':id'=>$id
                ]);
                $estado = 'TE HAS REGISTRADO EXITOSAMENTE';
                return require './login.view.php';
            }else{
                $estado = 'ERROR 404';
                // return require '../views/estado.view.php';
            }
        }
    }
    require '../views/register.view.php';

?>          