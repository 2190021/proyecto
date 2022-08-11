<div class="row contenido" style=" margin-top: 2%; margin-left:0.1%">
<?php
global $mysqli;
$idmarca = $_GET['idmarca'];
$strsql = "SELECT `idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `cantidad`, `url_imagen`, `fecha_creacion` FROM `productos` where `idmarca` = ?;";
if($stmt=$mysqli->prepare($strsql)){
    $stmt->bind_param("i",$idmarca);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows> 0){
        $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $cantidad, $url_imagen, $fecha_creacion);

    //nombre marca
   
    switch($idmarca){ 
      case "1":
        ?> <h1>Laneige</h1><?php
      break;

      case "2":
        ?> <h1>Farmacy</h1><?php
      break;
      
      case "default":
        ?> <h1>Skincare para ti</h1><?php
      break;
    }

        while ($stmt->fetch()) {
            ?>
            
            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
            <a class="nav-link" href="?modulo=producto_detalles&idproducto=<?php echo $idproducto ?>">

                 <div style="margin-top:7%"><img src="<?php echo $url_imagen ?>" alt="" class="img-fluid" /></div>
                 
                 <div><h6><?php echo $nombre_producto ?></h6></div>
                 <div><span><?php echo "L. ".number_format($precio, 2) ?></span></div>
                 </a>
            
            </div>
            <?php
            }
        } else {
          echo "No hay datos par mostrar";
        }
    } else {
      echo "Error al preparar la consulta";
    }

    ?>
    </div>