<?php
	require 'config/dbase.php';
	require 'config/funciones.php';
	$conexion = conexion($bd_config);
	$idpub = $_GET['pub'];

	$stm = $conexion->prepare('SELECT * FROM publicaciones WHERE id_pub = :idpub');
	$stm->execute([':idpub'=>$idpub]);
	$pub = $stm->fetch();//PARA PODER MANIPULAR UN SOLO REGISTRO

	$com = $conexion->prepare('SELECT * FROM comentarios WHERE id_pub = :idpub');
	$com->execute([':idpub'=>$idpub]);
	$men = $com; 
	
	$ttlcom = $conexion->prepare('SELECT count(*) FROM comentarios WHERE id_pub = :idpub');
	$ttlcom->execute([':idpub'=>$idpub]);
	$ttl = $ttlcom->fetch(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="vermas.css">
	<title>Ver mas</title>
</head>
<body>
	<!-- ENCABEZADO DE LA PAGINA -->
	<header>
		<div class="perfil">
			<div class="perfil-info">
				<img src="images/avatar.png" alt="">
				<p class="izquierda">Bienvenido!!!</p>
				<p class="derecha">
				<?php session_start();
					echo $_SESSION['usuario'];
				?>
				</p>
				<a href="cerrarsesion.php" class=derecha-a>Cerrar Sesion</a>
				<div class="clear"></div>
			</div>
		</div>
		
		<menu type="context">
			<ul>
				<li class="item-menu"><a href="">NOTICIAS</a></li>
				<li class="item-menu"><a href="">TENDENCIAS</a></li>
				<li class="item-menu"><a href="">OUTFITS</a></li>
			</ul>
		</menu>
    </header>
	<!-- SECCION DE NOTICIAS -->
    <main>
        <?php
            // foreach($pub as $valor){
                echo '<h1 class="post-titulo">'. utf8_decode($pub['titulo']).'</h1>';
				echo '<div class="post-in">'. utf8_decode($pub['conte']).'</div>';
				
            // }
        ?>
            <h2><?= $ttl['count(*)'] ?> Comentarios</h2>
        <?php

			foreach ($men as $valor ) {
                echo '<div class="post">';
                echo '<div class="imagen">';
                echo '<img src="images/avatar.png" alt="">';
                echo '</div>';
				echo '<p class="escritor">'. ' '.$valor['user'].' <br>'.$valor['fecha'].'</p>';
				echo '<div class="post-info">'. utf8_decode($valor['texto']).'</div>';
				echo '<div class="post-buttons">';
				echo '<a href="">Me gusta</a>';
				echo '</div>';
				echo '</div>';
			
            }
            ?>
            <a href="inicio.view.php" title="" class="botton-a">Regresar</a>
	</main>
	<!-- PIE DE PAGINA -->
	<footer>
		<div class="footer-info">
			Mayra Isabel Alvarez de la Cruz
			Cancún, Quintana Roo. 
		</div>
	</footer>
</body>
</html>