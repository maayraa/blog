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
        <table>
            <thead>
                <caption></caption>
                <tr>
                    <td>Id usuario</td>
                    <td>Usuario</td>
                    <td>Tipo de Usuario</td>
                </tr>
                <?php
                foreach ($usuario as $valor ) {
                    echo '<tr>';
                    echo '<td>'.$valor['id_usuario'].'</td>';
                    echo '<td>'.$valor['nom_user'].'</td>';
                    echo '<td>'.$valor['tipo_user'].'</td>';
                    echo '</tr>';
                }
                ?>
            </thead>
        </table>
    
    </main>
    <a href="administrador.view.php" title="" class="botton-a">Regresar</a>
</body>
</html>
   
    