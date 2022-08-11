<?php
include_once("conexion.php");
$nombre_producto=$_POST["nombre_producto"];
$idcategoria=$_POST["idcategoria"];
$descripcion=$_POST["descripcion"];
$precio=$_POST["precio"];
$cantidad=$_POST["cantidad"];
$url_imagen=$_POST["url_imagen"];
$idmarca=$_POST["idmarca"];

$sentencia=$base_de_datos->prepare("INSERT INTO productos(nombre_producto,idcategoria,descripcion,precio,cantidad,url_imagen,idmarca)
VALUES(:nombre_producto,:idcategoria,:descripcion,:precio,:cantidad,:url_imagen,:idmarca);");

$sentencia->bindParam(':nombre_producto',$nombre_producto);
$sentencia->bindParam(':idcategoria',$idcategoria);
$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam(':precio',$precio);
$sentencia->bindParam(':cantidad',$cantidad);
$sentencia->bindParam(':url_imagen',$url_imagen);
$sentencia->bindParam(':idmarca',$idmarca);

if($sentencia->execute()){
    return header("Location:../?modulo=admin_productos");
}
else{
    return "error";
}
?>