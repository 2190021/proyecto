<div class="row contenido" style=" margin-top: 2%; margin-left:0.1%">
<?php
global $mysqli;
$idcategoria = $_GET['idcategoria'];
$strsql = "SELECT `idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `cantidad`, `url_imagen`, `fecha_creacion` FROM `productos` where `idcategoria` = ?;";
if($stmt=$mysqli->prepare($strsql)){
    $stmt->bind_param("i",$idcategoria);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows> 0){
        $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $cantidad, $url_imagen, $fecha_creacion);

   //nombre categoria
   
   switch($idcategoria){ 
      case "1":
        ?> <h1>Jabones</h1><?php
      break;

      case "2":
        ?> <h1>Cremas</h1><?php
      break;

      case "3":
      ?> <h1>Exfoliantes</h1><?php
      break;

      case "4":
      ?> <h1>Protector Solar</h1><?php
      break;

      case "5":
        ?> <h1>Mascarillas</h1><?php
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
