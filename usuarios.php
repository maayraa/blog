<?php
include 'config/dbase.php';
include 'config/funciones.php';
$conexion = conexion($bd_config);

	$statement = $conexion->prepare("SELECT * FROM usuarios");
    $statement->execute();
    $usuario =$statement;

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
    <h1>Usuarios Registrados</h1>
    <main>
        <?php
        foreach ($usuario as $valor ) {
            echo $valor['id_usuario'].' '.' '.$valor['nom_user'];
            echo '<br><br>';
        }
                
                ?>
    
    </main>
    <a href="administrador.view.php" title="" class="botton-a">Regresar</a>
</body>
</html>
   
    