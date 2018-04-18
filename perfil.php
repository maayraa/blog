<?php session_start();
include 'config/dbase.php';
include 'config/funciones.php';
$conexion = conexion($bd_config);
// $iduser = $_GET['user'];
$iduser = iniciarSesion('usuarios', $conexion);
if ($_SESSION['usuario']) {
    # code...
	$statement = $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario = :iduser");
    $statement->execute([':iduser' =>$iduser['id_usuario'] ]);
    $usuario = $statement->fetch();
    
    $perfiles = $conexion->prepare("SELECT * FROM perfil WHERE id_perfil = :idper");
    $perfiles->execute([':idper'=>$usuario['id_perfil']]);
    $perfil = $perfiles->fetch();
}else{
    header('Location: '.RUTA.'index.view.php');
}
if (isset($_POST['boton'])) {
    $pas = $_POST['contra'];
    if (!empty($_POST['contra'])) {
        $updatePass = $conexion->prepare("UPDATE usuarios SET password = :pass WHERE id_usuario = :iduser");
        $updatePass->execute([
            ':pass'=>$pas,
            ':iduser'=>$iduser['id_usuario']
        ]);
    header('Location: '.RUTA.'perfil.php');
    } else{
        $error = '<li>Ingrese Una Contraseña</li>';
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="usuarios.css" />
    <title>Usuarios</title>
</head>
<body>
    <h1>Perfil de usuario</h1>
    <img src="images/avatar.png" alt="">
    <main>
        <table>
            <thead>
                <caption></caption>
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Correo</td>
                    <td>Usuario</td>
                </tr> 
                
                <?php
                //foreach ($usuario as $valor ) {
                    echo '<tr>';
                    echo '<td>'.($perfil['nombre']).'</td>';
                    echo '<td>'.($perfil['ape']).'</td>';
                    echo '<td>'.($perfil['correo']).'</td>';
                    echo '<td>'.($usuario['nom_user']).'</td>';
                    echo '</tr>';
                //}
                ?>
            </thead>
        </table>
        <?php 
            if ($usuario['tipo_user'] == 1) {
                echo '<h2>Usuario</h2>';
            }elseif ($usuario['tipo_user'] == 2) {
                echo '<h2>Moderador</h2>';
            }elseif ($usuario['tipo_user'] == 3) {
                echo '<h2>Administrador</h2>';
            }
        ?>
    
    

    <form action="perfil.php" method="post">
        <div class="n">
            <label for="">Nombre:</label>
            <input type="text" name=nombre value=<?= $perfil['nombre'] ?>>
        </div>
        <div class="n">
            <label for="">Apellido:</label>
            <input type="text" name="ape" value=<?= $perfil['ape'] ?>>
        </div>
        <div class="n">
            <label for="">Correo:</label>
            <input type="text" name="correo" value=<?= $perfil['correo'] ?>>
        </div>
        <div class="n">
            <label for="">Usuario:</label>
            <input type="text" name="nom_user" value=<?= $usuario['nom_user'] ?>>
        </div>
            <div class="n">
                <input type="submit" class="botton-c" name=datos>
            </div>
    </form>
    </main>
    <form action="perfil.php" method="post">
    
        <input type="text" name=contra>
        <button title="" class="botton-c" name=boton>Cambiar contraseña</button>
        <a href="inicio.view.php" title="" class="botton-a">Regresar</a>
    </form>
    <?php
        if (!empty($error)) {
            echo $error;
        }
    ?>  
</body>
</html>
   
<?php
    function updatePerfil($id, $newNombre, $newApe, $newCorreo, $newUser, $conexion) {
		$statement = $conexion->prepare("UPDATE usuarios SET nom_user = :nombre WHERE id_perfil = :id");
		$statement->execute([
			':id'       =>  $id,
			':nombre'   =>  $newUser
		]);
		if (!empty($newNombre)) {
			$statement2 = $conexion->prepare("UPDATE perfil SET nombre = :nombre, ape = :ape, correo = :correo WHERE id_perfil = :id");
			$statement2->execute([
				'id'    =>  $id,
                ':nombre' =>  $newNombre,
                ':ape' => $newApe,
                ':correo' => $newCorreo
			]);
			$_SESSION['usuario'] = $newUser;
		}
		$resulado = 'correcto';
		return $resulado;
	}

    if (!empty($_POST['datos'])) {
        if (!empty($_POST['nombre']) || !empty($_POST['ape']) || !empty($_POST['correo']) || !empty($_POST['nom_user'])) {
			$id			= $usuario['id_perfil'];
			$newNombre	= $_POST['nombre'];
			$newApe		= $_POST['ape'];
			$newCorreo	= $_POST['correo'];
			$newUser	= $_POST['nom_user'];
			$resultado	= updatePerfil($id, $newNombre, $newApe, $newCorreo, $newUser, $conexion);
			header('Location: '.RUTA.'perfil.php');
		}
    }