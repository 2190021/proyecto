<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo $urlweb?>app/css/estilo.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
    <title>Tienda Virtual</title>
  </head>

  <body>
    <div id="principal">
      <!--Topnav-->
      <nav
        class="navbar navbar-expand-lg"
        style="
          padding-top: 0%;
          padding-bottom: 0%;
          background-color: rgb(184, 208, 245);
        "
      >
        <div class="container-fluid">
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse"
            id="navbarSupportedContent"
            style="padding-left: 5%"
          >

           <!-- Button trigger modal -->

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                  >Bienvenido</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#ofertasdiarias">Ofertas diarias</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="?modulo=skincare">Skincare</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#" data-bs-toggle="modal" data-bs-target="#ayuda">Ayuda y contacto</a>
              </li>
            </ul>
            <div  style="padding-right: 7%">

              <a class="nav-link"  href="?modulo=carrito"
                ><i class="bi bi-cart-fill"></i>
              </a>
            </div>
          </div>
        </div>
      </nav>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <h5 class="modal-title" id="exampleModalLabel">¡Bienvenido!</h5>
              <p>A continuación encontrará los módulos disponibles para este sitio web.</p>
              <!-- Colapsible -->
              <p>
                <a class="btn btn-warning " data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                  <i class="bi bi-shop"></i> Administración de Productos </a>
                  
              </p>
              <div class="row">
                <div class="col">
                  <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body">
                      <a href="?modulo=admin_productos">
                      <button class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Administrar Productos 
                      </button>
                      </a>
                      <a href="?modulo=admin_categorias">
                      <button class="btn btn-primary" style="margin-top: 2%;">
                        <i class="bi bi-plus-circle"></i> Administrar Categorias 
                      </button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="container">
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg" style="background-color: orange">
          <div class="container-fluid">
            <a class="navbar-brand" style="padding: 0" href="?modulo=inicio"
              ><img
                src="app/img/sephora.svg.png"
                class="col-3"
                alt=""
                style="float: left"
            /></a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarScroll2"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div
              class="collapse navbar-collapse justify-content-end"
              id="navbarScroll2"
            >
              <form  role="search">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle active white"
                      href="#"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      Categorías
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="?modulo=producto_categoria&idcategoria=<?php echo $idcategoria=1?>">Jabones</a></li>
                      <li>
                        <a class="dropdown-item" href="?modulo=producto_categoria&idcategoria=<?php echo $idcategoria=2?>">Cremas</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="?modulo=producto_categoria&idcategoria=<?php echo $idcategoria=3?>">Exfoliantes</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="?modulo=producto_categoria&idcategoria=<?php echo $idcategoria=4?>">Protector Solar</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="?modulo=producto_categoria&idcategoria=<?php echo $idcategoria=5?>">Mascarillas</a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active white" href="?modulo=productos">Productos </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active white" href="?modulo=productos"
                      ><i class="bi bi-shop"></i
                    ></a>
                  </li>
                </ul>
              </form>
            </div>
          </div>
        </nav>

       


<!-- Modal Ayuda y contacto -->
<div class="modal fade" id="ayuda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:orange;">Ayuda y Contacto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6 >Si tienes consultas sobre cualquiera de nuestros productos puedes contactarnos a través de: <br></h6>
        <p></p>
        <b><i class="bi bi-envelope"></i> sephora@gmail.com <br></b>
        
        <i class="bi bi-whatsapp"></i> +504 9978-8787 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

        <!-- Contenido dinámic- Modulo Inicio -->
        <div class="contenedor">
          <?php $funciones->modulo($modulo); ?>
        </div>


        <!-- Footer -->
        <footer class="text-center text-lg-start" style="margin-top: 2%">
          <div class="text-center p-3" style="background-color: orange">
            <div class="row" style="color: white">
              <div class="col-6" style="text-align: center">
                <i class="bi bi-c-circle"></i>
                2022 Desarrollo de Aplicaciones en Internet
              </div>
              <div class="col-6" style="text-align: center">usap.edu</div>
            </div>
          </div>
        </footer>
      </div>
    </div>


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
   
  </body>
</html>