<?php
	require 'config/dbase.php';
	require 'config/funciones.php';
	$conexion = conexion($bd_config);
	$stm = $conexion->prepare('SELECT * FROM publicaciones');
	$stm->execute();
	$pub = $stm;
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="inicio.css">
	<title>Inicio</title>
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
	<div class="clear"></div>
	<!-- SECCION DE NOTICIAS -->
	<main>
		<?php
			foreach ($pub as $valor ) {
				echo '<div class="post">';
				echo '<h1 class="post-titulo">'. $valor['titulo'] .'</h1>';
				echo '<p class="escritor">'. $valor['nom_user'], $valor['fecha'].'</p>';
				echo '<div class="post-info">'. $valor['conte']. '</div>';
				echo '<div class="post-buttons">';
				echo '<a href="">Me gusta</a>
					  <a href="">Comentar</a>
					  <a href="">Visitas</a>
                      <a href="">Ver Mas</a>';
				echo '</div>';
				echo '</div>';
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