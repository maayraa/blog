<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="administrador.css">
	<title>Administrador</title>
</head>
<body>
	<!-- ENCABEZADO DE LA PAGINA -->
	<header>
		<div class="perfil">
			<div class="perfil-info">
				<img src="images/avatar.png" alt="">
				<p class="izquierda">Blog de Moda</p>
				<p class="derecha">
				<?php session_start();
					echo $_SESSION['usuario'];
				?>
				</p>
				<div class="clear"></div>
			</div>
		</div>
		
		<menu type="context">
			<ul>
                <li class="item-menu"><a href="nuevapub.view.php">NUEVA PUBLICACION</a><img src="images/Publicacion.png" alt=""></li>
                <li class="item-menu"><a href="">USUARIOS</a><img src="images/usuarios.png" alt=""></li>
                <li class="item-menu"><a href="">VER POSTS</a><img src="images/posts.png" alt=""></li>
			</ul>
		</menu>
	</header>
	<div class="clear"></div>
	<!-- SECCION DE NOTICIAS -->
	<main>
	</main>
	<!-- PIE DE PAGINA -->
	<footer>
		<div class="footer-info">
		</div>
	</footer>
</body>
</html>