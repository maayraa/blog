<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="index.css">
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
		<div class="post">
			<h1 class="post-titulo">Titulo</h1>
			<p class="fecha">10/12/1234</p>
			<p class="escritor">Mayra</p>
			<div class="post-info">
				Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit sit esse omnis quae laborum facere illo enim veniam debitis porro libero deleniti at quo, nihil assumenda odit tempora, qui nulla.
			</div>
			<div class="post-buttons">
				<a href="">Me gusta</a>
				<a href="">Comentar</a>
				<a href="">Visitas</a>
				<a href="">Ver Mas</a>
			</div>
		</div>
		<div class="post">
			<h1 class="post-titulo">Titulo</h1>
			<p class="fecha">10/12/1234</p>
			<p class="escritor">Mayra</p>
			<div class="post-info">
				Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit sit esse omnis quae laborum facere illo enim veniam debitis porro libero deleniti at quo, nihil assumenda odit tempora, qui nulla.
			</div>
			<div class="post-buttons">
				<a href="">Me gusta</a>
				<a href="">Comentar</a>
				<a href="">Visitas</a>
				<a href="">Ver Mas</a>
			</div>
		</div>
		<div class="post">
			<h1 class="post-titulo">Titulo</h1>
			<p class="fecha">10/12/1234</p>
			<p class="escritor">Mayra</p>
			<div class="post-info">
				Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit sit esse omnis quae laborum facere illo enim veniam debitis porro libero deleniti at quo, nihil assumenda odit tempora, qui nulla.
			</div>
			<div class="post-buttons">
				<a href="">Me gusta</a>
				<a href="">Comentar</a>
				<a href="">Visitas</a>
				<a href="">Ver Mas</a>
			</div>
		</div>
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