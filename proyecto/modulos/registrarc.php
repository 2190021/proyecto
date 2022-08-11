<?php
include_once("conexion.php");
$nombre_categoria=$_POST["nombre_categoria"];
$descripcion=$_POST["descripcion"];
$url_imagen=$_POST["url_imagen"];


$sentencia=$base_de_datos->prepare("INSERT INTO categorias(nombre_categoria,descripcion,url_imagen)
VALUES(:nombre_categoria,:descripcion,:url_imagen);");

$sentencia->bindParam(':nombre_categoria',$nombre_categoria);
$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam(':url_imagen',$url_imagen);


if($sentencia->execute()){
    return header("Location:../?modulo=admin_categorias");
}
else{
    return "error";
}
?>