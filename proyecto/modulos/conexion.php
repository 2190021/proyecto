<?php
$contraseña="";
$usuario="root";
$nombrebd="desarrollo_aplicaciones";
try{
    $base_de_datos= new PDO('mysql:host=localhost;dbname='.$nombrebd,$usuario,$contraseña);
//echo "<script>alert('La conexion se realizo correctamente')</script>";
} catch(Exception $ex){
    echo "<script>alert('Ocurrio un error al conectarse')</script>".$ex->getMessage();
}
?>