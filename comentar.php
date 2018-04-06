<?php session_start();
    include_once './config/dbase.php';
    include_once './config/funciones.php';

    $conexion = conexion($bd_config);
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fecha = date ('Y-n-d');
        $texto = $_POST['comentario'];
        $idUser = iniciarSesion('usuarios', $conexion);
		$statement = $conexion->prepare("INSERT INTO comentarios (id_pub, id_usuario, user, texto, fecha, status)VALUES(:id_pub, :id_usuario, :user, :texto, :fecha, :status)");
		$statement ->execute([
			':id_pub' => $_SESSION['id_pub'],
			':id_usuario' => $idUser['id_usuario'],
			':user' => $_SESSION['usuario'],
			':texto' => $texto,
			':fecha' => $fecha,
			':status' => '1'
		]);
        header('Location: '.RUTA.'publicacion.php?pub='.$_SESSION['id_pub']);
    }

    