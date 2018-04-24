<?php
	require 'config/dbase.php';
	require 'config/funciones.php';
	
	$conexion = conexion($bd_config);
	$stm = $conexion->prepare('SELECT * FROM publicaciones WHERE id_cat = 1');
	$stm->execute();
		
	$pub = $stm;
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="inicio.css">
	<title>Tendencias</title>
</head>
<body>
	<!-- ENCABEZADO DE LA PAGINA -->
	<header>
		<div class="perfil">
			<div class="perfil-info">
				<img src="images/avatar.png" alt="">
				<p class="izquierda">Bienvenido!!!</p>
				<p class="derecha" href="perfil.php">
				<?php session_start();
					echo '<a href="perfil.php?user='.$_SESSION['id_usuario'].'">'.$_SESSION['usuario'].'</a>';
				?>
				</p>
				<a href="cerrarsesion.php" class=derecha-a>Cerrar Sesion</a>
				<div class="clear"></div>
				<!--<input type="text" placeholder="Buscar">-->
			</div>
		</div>
		
		<menu type="context">
			<ul>
				<li class="item-menu"><a href="./inicio.view.php">INICIO</a></li>
				<li class="item-menu"><a href="./noticias.view.php">NOTICIAS</a></li>
				<li class="item-menu"><a href="./tendencias.view.php">TENDENCIAS</a></li>
				<li class="item-menu"><a href="./novedades.view.php">NOVEDADES</a></li>
			</ul>
		</menu>
	</header>
	<div class="clear"></div>
	<!-- SECCION DE NOTICIAS -->
	<main>
		<?php

			foreach ($pub as $valor ) {
				
				$ttllik = $conexion->prepare("SELECT count(*) FROM likes WHERE id_pub = :idpub");
				$ttllik->execute([
					':idpub'=>$valor['id_pub']
					]);
				$lik = $ttllik->fetch(); 


				$query = $conexion->prepare("SELECT * FROM likes WHERE id_usuario = :iduser AND id_pub = :idpub LIMIT 1");
				$query->execute([
					':idpub'=>$valor['id_pub'],
					':iduser'=>$_SESSION['id_usuario']
				]);
				$like = $query->fetch();
				if ($like == false) {
					$mg = '<form action="./likes.php" method=post>
					<input type=text value='.$valor['id_pub'].' name=idpub class=esconder>
					<input type=submit value=Like name=like>
					</form>';
				} else {
					$mg = '<form action="./likes.php" method=post>
					<input type=text value='.$valor['id_pub'].' name=idpub class=esconder>
					<input type=submit value="Don´t Like" name=dontlike>
					</form>';
				}
				echo '<div class="post">';
				echo '<h1 class="post-titulo">'. utf8_decode($valor['titulo']).'</h1>';
				echo '<p class="escritor">'. $valor['nom_user'].' '.$valor['fecha'].'</p>';
				echo '<div class="post-info">'. utf8_decode($valor['conte']).'</div>';
				echo '<div class="post-buttons">';
				echo $mg;
				echo $lik['count(*)'];
				
				echo '
					  <a href="./publicacion.php?pub='.$valor['id_pub'].'">Comentar</a>
                      <a href="./vermas.view.php?pub='.$valor['id_pub'].'">Ver Mas</a>';
				echo '</div>';
				echo '</div>';
				echo '<div class="clear"></div>';
			
			}
			?>
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