<?php
global $mysqli;
$idoferta = $_GET['idoferta'];
$strsql="SELECT `idoferta`, `nombre_oferta`, `idproducto`, `descripcion`, `precio`, `url_imagen`, `fecha_creacion` FROM `ofertas` where `idoferta` = ?;";
if($stmt=$mysqli->prepare($strsql)){
    $stmt->bind_param("i",$idoferta);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows> 0){
        $stmt->bind_result($idoferta, $nombre_oferta, $idproducto, $descripcion, $precio, $url_imagen, $fecha_creacion);
        $stmt->fetch();
    }else{
        echo "No hay datos para mostrar";
    }
}else{
    echo "Error al preparar la consulta";
}
?>

<div class="row col-12 contenido " style=" margin-top: 2%; margin-left:0.1%">
    <div class="col-12" >
    <img style="margin-top:3%" src="<?php echo $url_imagen ?>" alt="" class="img-fluid" />
    </div>

    <div class="col-12">
        <p></p>
        <h4><?php echo $nombre_oferta?></h4>
        <p>Descripcion de la oferta: <b><span><?php echo $descripcion?></span></b></p>
        <h5>Precio: <b><?php echo $precio?></b></h5>
        <form action="modulos/registrarcart.php" method="POST" >
        <input name="id" type="hidden" id="id" value="<?php echo $idoferta?>" />
        <input name="nombre" type="hidden" id="nombre" value="<?php echo $nombre_oferta?>" />
        <input name="descripcion" type="hidden" id="descripcion" value="<?php echo $descripcion?>" />
        <input name="imagen" type="hidden" id="imagen" value="<?php echo $url_imagen?>" />
        <input name="precio" type="hidden" id="precio" value="<?php echo $precio?>" />
        <button class="btn btn-primary" type="submit" > <i class="bi bi-cart-plus"></i> Agregar al carrito</button>
    </form>
        <p></p>
    </div>
</div>