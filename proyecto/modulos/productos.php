<div class="row contenido" style=" margin-top: 2%; margin-left:0.05%">

<?php global $mysqli; ?>


            <div class="row">
              <h4 class="left mt-3 mb-3">Skincare para ti.</h4>
            </div>
          <div class="row">
          <?php
          $strsql =
              "SELECT `idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `cantidad`, `url_imagen`, `fecha_creacion` FROM `productos` ";
          if ($stmt = $mysqli->prepare($strsql)) {
              $stmt->execute();
              $stmt->store_result();
              if ($stmt->num_rows > 0) {
                  $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $cantidad, $url_imagen, $fecha_creacion);
                  while ($stmt->fetch()) { ?>
                  <div class="col-6 col-sm-6 col-md-3 col-lg-3 mb-4">
                  <a class="nav-link" href="?modulo=producto_detalles&idproducto=<?php echo $idproducto; ?>">

                       <div><img src="<?php echo $url_imagen; ?>" alt="" class="img-fluid" /></div>
                       
                       <div><h6><?php echo $nombre_producto; ?></h6></div>
                       <div><span><?php echo "L. " .
                           number_format($precio, 2); ?></span></div>
                       </a>
                  </div>
                  
                  <?php }
              } else {
                  echo "No hay datos par mostrar";
              }
          } else {
              echo "Error al preparar la consulta";
          }
          ?>
          </div>