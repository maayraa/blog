<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>publicacion</title>
    <link rel="stylesheet" href="nuevapub.css">
</head>
<div class="perfil">
<body>
    <h1>Nueva publicacion</h1>
</div>
<form action="nuevapub.php" method="POST">
<div class="content-user">
    <label>Id de publicacion:</label><input type="text" name="id_pub">
</div>
<br>
<div class="content-user">
    <label>Id de categoria:</label><input type="text" name="id_cat">
</div>
<br>
<div class="content-user">
    <label>Id de usuario:</label><input type="text" name="id_usuario">
</div>
<br>
<div class="content-user">
    <label>Usuario:</label><input type="text" name="nom_user">
</div>
<br>
<div class="content-user">
    <label>Titulo:</label><input type="text" name="titulo">
</div>
<br>
 <div class="content-pass">
    <label>Contenido:</label><input type="text" name="conte" >
</div> 
<br>
<div class="content-user">
    <label>Fecha:</label><input type="date" name="fecha">
</div> 
<br>
<div class="content-user">
    <label>Estatus:</label><input type="text" name="status">
</div> 
<br>
<input type="submit" value="Publicar" class="botton-i" href="inicio.view.php">
<a href="administrador.view.php" title="" class="botton-a">Regresar</a>
    
    
</body>
</html>