<?php
$servidor = "localhost";
$basedatos = "desarrollo_aplicaciones";
$usuario = "root";
$password = "";
$mysqli = new mysqli($servidor, $usuario, $password, $basedatos);
    if($mysqli->connect_errno){
        echo $mysqli->connect_error;
    }

    $urlweb ="http://localhost/proyecto/";
?>