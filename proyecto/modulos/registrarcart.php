<?php
include_once("conexion.php");
$id=$_POST["id"];
$nombre=$_POST["nombre"];
$descripcion=$_POST["descripcion"];
$imagen=$_POST["imagen"];
$precio=$_POST["precio"];


$sentencia=$base_de_datos->prepare("INSERT INTO carrito(nombre,descripcion,img,precio)
VALUES(:nombre,:descripcion,:imagen,:precio);");

$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam(':imagen',$imagen);
$sentencia->bindParam(':precio',$precio);




if($sentencia->execute()){
   echo '<script language="javascript">alert("El producto se agrego al carrito");</script>';
   return header("Location:../?modulo=carrito");

}
else{
    return "error";
}
?>

