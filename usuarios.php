<?php
include 'config/dbase.php';
include 'config/funciones.php';
$conexion = conexion($bd_config);

	$statement = $conexion->prepare("SELECT * FROM usuarios");
    $statement->execute();
    $usuario =$statement;

    if (!empty($_POST['btn'])) {
        $tipo   = $_POST['tipo'];
        $user   = $_POST['user'];
        $statement = $conexion->prepare("UPDATE usuarios SET tipo_user = :tipo WHERE id_usuario = :user");
        $statement->execute([
            ':tipo' =>  $tipo,
            ':user' =>  $user
        ]);
        header ('Location: '.RUTA.'usuarios.php');
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
    <h1>Usuarios Registrados</h1>
    <main>
    <form action="usuarios.php" method="POST">
        <table>
            <thead>
                <caption></caption>
                <tr>

                    <td>Id usuario</td>
                    <td>Nombre<select name="user">
                        <?php
                            foreach ($usuario as $valor) {
                                echo '<option value="'.$valor['id_usuario'].'" name=user>'.$valor['nom_user'].'</option>';
                            }
                        ?>
                    </select></td>
                    <td>Tipo de usuario</td>
                    <td>
                    <select name="tipo">
                        <option value="1">Usuario</option>
                        <option value="2">Moderador</option>
                        <option value="3">Administrador</option>
                    </select>
                </td>
                <td>
                    <input type="submit" value="Guardar" class=i_button_c name=btn>
                </td>
                </tr>

                <?php
                    $statement = $conexion->prepare("SELECT * FROM usuarios");
                    $statement->execute();
                    $usuario =$statement;
                    foreach ($usuario as $valor ) {
                        echo '<tr>';
                        echo '<td>'.$valor['id_usuario'].'</td>';
                        echo '<td>'.$valor['nom_user'].'</td>';
                        switch ($valor['tipo_user']) {
                            case '1':
                                echo '<td>Miembro</td>';
                            break;
                            case '2':
                                echo '<td>Moderador</td>';
                            break;
                            case '3':
                                echo '<td>Administrador</td>';
                                break;
                            default:
                                # code...
                                break;
                        }
                        echo '</tr>';
                    }
                ?>
            </thead>
        </table>
    </form>  
    </main>
    <a href="administrador.view.php" title="" class="botton-a">Regresar</a>
</body>
</html>
   
    