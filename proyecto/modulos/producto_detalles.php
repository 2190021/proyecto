<?php
global $mysqli;
$idproducto = $_GET['idproducto'];
$strsql="SELECT `idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `cantidad`, `url_imagen`, `fecha_creacion` FROM `productos` where `idproducto` = ?;";
if($stmt=$mysqli->prepare($strsql)){
    $stmt->bind_param("i",$idproducto);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows> 0){
        $stmt->bind_result($idproducto,$nombre_producto,$idcategoria,$descripcion,$precio,$cantidad,$url_imagen,$fecha_creacion);
        $stmt->fetch();
    }else{
        echo "No hay datos para mostrar";
    }
}else{
    echo "Error al preparar la consulta";
}
?>

<div class="row col-12 contenido " style="padding-top: 2%; margin-top: 2%; margin-left:0.1%">
    <div class="col-12 col-sm-12 col-md-4 col-lg-4" >
    <img src="<?php echo $url_imagen ?>" alt="" class="img-fluid" />
    </div>
    <div class="col-12 col-sm-12 col-md-8 col-lg-8 ">
        <p></p>
        <h4><?php echo $nombre_producto?></h4>
        <p>Descripción del producto: <b><span><?php echo $descripcion?></span></b></p>
        <p>Cantidad en existencia: <b><span><?php echo $cantidad?></span></b></p>
        <h5>Precio: <b><?php echo "L. ".number_format($precio,2) ?></b></h5>
        <form action="modulos/registrarcart.php" method="POST" >
        <input name="id" type="hidden" id="id" value="<?php echo $idproducto?>" />
        <input name="nombre" type="hidden" id="nombre" value="<?php echo $nombre_producto?>" />
        <input name="descripcion" type="hidden" id="descripcion" value="<?php echo $descripcion?>" />
        <input name="imagen" type="hidden" id="imagen" value="<?php echo $url_imagen?>" />
        <input name="precio" type="hidden" id="precio" value="<?php echo $precio?>" />
        <button class="btn btn-primary" type="submit" > <i class="bi bi-cart-plus"></i> Agregar al carrito</button>
    </form>
        <p></p>
    </div>
    
</div>


