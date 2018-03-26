<?php session_start();
include './config/dbase.php';
include './config/funciones.php';
session_destroy();
header('Location: '.RUTA.'index.view.php');