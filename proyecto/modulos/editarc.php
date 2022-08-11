<?php
include_once("conexion.php");
$idcategoria=$_POST["idcategoria"];
$nombre_categoria=$_POST["nombre_categoria"];
$descripcion=$_POST["descripcion"];
$url_imagen=$_POST["url_imagen"];

$sentencia=$base_de_datos->prepare("UPDATE categorias SET nombre_categoria= :nombre_categoria,descripcion= :descripcion,url_imagen= :url_imagen WHERE idcategoria=:idcategoria;");

$sentencia->bindParam(':idcategoria',$idcategoria);
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