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
				<?php
					echo $_SESSION['usuario'];
				?>
				</p>
				<a href="cerrarsesion.php" class=derecha-a>Cerrar Sesion</a>
				<div class="clear"></div>
			</div>
		</div>
		
		<menu type="context">
			<ul>
				<li class="item-menu"><a href="./inicio.view.php">NOTICIAS</a></li>
				<li class="item-menu"><a href="">TENDENCIAS</a></li>
				<li class="item-menu"><a href="">OUTFITS</a></li>
			</ul>
		</menu>
	<div class="content-noticia">
	</header>
	<div class="clear"></div>
	<div class="item-noticia">
		<h1><?php  echo utf8_decode($pubs['titulo'])?></h1>
	</div>
	<form action="comentar.php" method="post">
	<div class="content">
       <br><label>Comentar Publicacion</label><br><textarea name="comentario" cols="30" rows="10"></textarea>
    </div>
	<div class="item-img">
		<img src="" alt="">
	</div>
	</div>
	<input type="submit" value="Enviar comentario" class="botton-i" href="inicio.view.php">
	</form>
	<a href="inicio.view.php" title="" class="botton-a">Regresar</a>
	
	<!-- COMENTARIOS -->
	<div class="content-coment">
	</div>
	<!-- VER COMENTARIOS -->

	<!-- PIE DE PAGINA -->
	<footer>
		<div class="footer-info">
			Mayra Isabel Alvarez de la Cruz
			Cancún, Quintana Roo. 
		</div>
	</footer>
</body>
</html>