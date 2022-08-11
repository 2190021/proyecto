
         <!-- Slider -->
         <div class="border">
          <div
            id="carouselExampleIndicators"
            class="carousel slide"
            data-bs-ride="true"
          >
            <div class="carousel-indicators">
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="1"
                aria-label="Slide 2"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="2"
                aria-label="Slide 3"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="3"
                aria-label="Slide 4"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="4"
                aria-label="Slide 5"
              ></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="app/img/banner3.jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="app/img/banner1.jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="app/img/slider1.jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="app/img/banner4.jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="app/img/oferta.png" class="d-block w-100" alt="..." />
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>

        <div class="contenido">
          <div class="col-12 ">

          <?php
          global $mysqli;
          ?>

            <div class="row">
              <h4 class="left">Skincare para ti.</h4>
            </div>
          <div class="row">
          <?php
          $strsql = "SELECT `idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `cantidad`, `url_imagen`, `fecha_creacion` FROM `productos` LIMIT 4";
          if ($stmt = $mysqli->prepare($strsql)){
              $stmt->execute();
              $stmt->store_result();
              if ($stmt->num_rows > 0){
                  $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $cantidad, $url_imagen, $fecha_creacion);
                  while ($stmt->fetch()) {
                  ?>
                  <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                  <a class="nav-link" href="?modulo=producto_detalles&idproducto=<?php echo $idproducto ?>">

                       <div><img src="<?php echo $url_imagen ?>" alt="" class="img-fluid" /></div>
                       
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
        </div>
        </div>

        <div class="contenido">
          <div class="col-12 container">
            <div class="row">
              <h4 class="left">Las mejores marcas.</h4>
            </div>

            
            <div class="row">
            <?php
            $strsql = "SELECT `idmarca`, `nombre_marca`, `url_imagen`, `fecha_creacion` FROM `marcas` LIMIT 2";
            if ($stmt = $mysqli->prepare($strsql)){
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0){
              $stmt->bind_result($idmarca, $nombre_marca, $url_imagen, $fecha_creacion);
              while ($stmt->fetch()) {
                ?>
                
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 container">
                  <a class="nav-link" href="?modulo=producto_marca&idmarca=<?php echo $idmarca ?>">
                   <div><img src="<?php echo $url_imagen ?>" alt="" class="img-fluid" /></div>
                   <div><h6><?php echo $nombre_marca ?> <br /> <br /></h6></div>
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

            <div class="row" id="ofertasdiarias">
              <h4 class="left">Oferta Especial</h4>
            </div>

            <?php
          $strsql = "SELECT `idoferta`, `nombre_oferta`, `idproducto`, `descripcion`, `precio`, `url_imagen`, `fecha_creacion` FROM `ofertas` LIMIT 1";
          if ($stmt = $mysqli->prepare($strsql)){
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0){
              $stmt->bind_result($idoferta,$nombre_oferta, $idproducto, $descripcion, $precio, $url_imagen, $fecha_creacion);
              while ($stmt->fetch()) {
                ?>
                <div class="col-12 container">
                <a class="nav-link" href="?modulo=oferta_detalles&idoferta=<?php echo $idoferta ?>">

                  <div><img src="<?php echo $url_imagen ?>" alt="" class="img-fluid" /></div>
                  <div><h6><?php echo $nombre_oferta ?> </h6></div>
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
            

            <div class="row">
              <h4 class="left">Compra por categoría</h4>
            </div>
          </div>

          <div class="row">
          <?php
          $strsql = "SELECT `idcategoria`, `nombre_categoria`, `descripcion`, `fecha_creacion`, `url_imagen` FROM `categorias` LIMIT 4";
          if ($stmt = $mysqli->prepare($strsql)){
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0){
              $stmt->bind_result($idcategoria, $nombre_categoria, $descripcion, $fecha_creacion, $url_imagen);
              while ($stmt->fetch()) {
                ?>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                <a class="nav-link" href="?modulo=producto_categoria&idcategoria=<?php echo $idcategoria?>">
                 <div><img src="<?php echo $url_imagen ?>" alt="" class="img-fluid" /></div>
                 <div><h6></h6><?php echo $nombre_categoria ?></div>
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
        </div>