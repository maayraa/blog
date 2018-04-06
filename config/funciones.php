<?php

    function conexion($bd_config) {
        try{
            $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['db_name'],$bd_config['user'],$bd_config['pass']);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    function iniciarSesion ($table, $conexion){
        $statement = $conexion->prepare("SELECT * FROM $table WHERE nom_user = :usuario");
        $statement->execute([
            ':usuario'=>$_SESSION['usuario']
        ]);
        return $statement->FETCH(PDO::FETCH_ASSOC);
    }
    
    function getPerfiles($correo, $conexion){
        $query = $conexion->prepare("SELECT * FROM perfil WHERE correo = :correo");
        $query->execute([
            ':correo'=>$correo
        ]);
        return $query->FETCH(PDO::FETCH_ASSOC);
    }

    function pubs($id, $conexion){
        $statement = $conexion->prepare("SELECT * FROM publicaciones WHERE id_pub =  :id");
        $statement->execute([':id'=>$id]);
        return $tabla = $statement->fetch();
    }
