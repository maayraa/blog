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
	<link rel="stylesheet" href="index.css">
	<title>index</title>
</head>
<body>
	<!-- ENCABEZADO DE LA PAGINA -->
	<header>
		<div class="perfil">
			<div class="perfil-info">
				<img src="images/avatar.png" alt="">
				<p class="izquierda">Blog de moda</p>
				<p class="derecha"><a href="login.view.php">Iniciar Sesion</a></p>
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
				echo '<div class="post-info">'. $valor['conte']. '</div>';
				echo '</div>';
			}
		?>
	</main>
	<!-- PIE DE PAGINA -->
	<footer>
		<div class="footer-info">
		</div>
	</footer>
</body>
</html>