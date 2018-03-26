<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="login.css">
       
    </head>
    <body>
        <!--  -->
    <div class="title-i">
        <div class="title-img">
            <img src="https://s7.favim.com/mini/150523/draw-drawing-fashion-hayden-williams-Favim.com-2758284.jpg" alt="">
        </div>
    </div>
    <!-- LOGIN -->
    <div class="content">
		<div class="content-center">
            <form action="login.php" method="POST">
                <div class="content-img">
                    <img src="images/usuario.png" alt="">
                </div>
                <div class="content-user">
                    <label>Usuario:</label><input type="text" name="user">
                </div>
                <div class="content-pass">
                    <label>Contraseña:</label><input type="text" name="pass">
                </div>
                <div class="content-botton">
                    <input type="submit" value="Ingresar" name="subm" class="botton-i">
                    <a href="registro.view.php" title="" class="botton-a">Registrarse</a>
                </div>
            </form>
        </div>
	</div>
    </body>
</html>



