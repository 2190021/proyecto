<?php
include_once("conexion.php");
$idproducto=$_POST["idproducto"];
$nombre_producto=$_POST["nombre_producto"];
$idcategoria=$_POST["idcategoria"];
$descripcion=$_POST["descripcion"];
$precio=$_POST["precio"];
$cantidad=$_POST["cantidad"];
$url_imagen=$_POST["url_imagen"];
$idmarca=$_POST["idmarca"];

$sentencia=$base_de_datos->prepare("UPDATE productos SET nombre_producto= :nombre_producto,idcategoria= :idcategoria,descripcion= :descripcion,precio= :precio,cantidad= :cantidad,url_imagen= :url_imagen,idmarca= :idmarca WHERE idproducto=:idproducto;");

$sentencia->bindParam(':idproducto',$idproducto);
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