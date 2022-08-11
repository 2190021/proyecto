<?php
global $mysqli;
global $urlweb;
?>
<div class="container" >
  <h2>Administrador de Productos </h2>

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertar">
<i class="bi bi-plus-circle"></i> Añadir Producto
</button>

<!-- Modal   Insertar-->
<div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <form action="modulos/registrar.php" method="POST" >

          <div class="form-group">
          <label class="form-label">Producto:</label>
          <input type="text" class="form-control" name="nombre_producto"  required >
          </div>

          <div class="form-group">
          <label class="form-label mt-3">Categoría:</label>
          <input type="number" class="form-control" name="idcategoria"  required >
          </div>

          <div class="form-group">
          <label class="form-label mt-3">Descripción:</label>
          <input type="text" class="form-control" name="descripcion" required >
          </div>

          <div class="form-group">
          <label class="form-label mt-3">Precio:</label>
          <input type="text" class="form-control" name="precio"  required  >
          </div>

          <div class="form-group mt-3">
          <label class="form-label">Cantidad:</label>
          <input type="number" class="form-control" name="cantidad"   required >
          </div>

          <div class="form-group mt-3">
          <label class="form-label">Url Imagen:</label>
          <input type="text" class="form-control" name="url_imagen"  required >
          </div>

          <div class="form-group mt-3">
          <label class="form-label">Marca:</label>
          <input type="number" class="form-control" name="idmarca"  required >
          </div>

          <div class="modal-footer">
          <button  type="submit" class="btn btn-primary" >Agregar</button>
          </div>
      </form>
 
      </div>
      
    </div>
  </div>
</div>


<!-- Modal   Editar-->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <form action="modulos/editar.php" method="POST" >
          <input type="text" name="idproducto"  id="update_id" style="visibility:collapse; display:none;">

          <div class="form-group">
          <label class="form-label">Producto:</label>
          <input type="text" class="form-control" name="nombre_producto" id="nombre_producto" required >
          </div>

          <div class="form-group">
          <label class="form-label mt-3">Categoría:</label>
          <input type="text" class="form-control" name="idcategoria" id="idcategoria" required >
          </div>

          <div class="form-group">
          <label class="form-label mt-3">Descripción:</label>
          <input type="text" class="form-control" name="descripcion" id="descripcion" required >
          </div>

          <div class="form-group">
          <label class="form-label mt-3">Precio:</label>
          <input type="text" class="form-control" name="precio" id="precio" required  >
          </div>

          <div class="form-group mt-3">
          <label class="form-label">Cantidad:</label>
          <input type="number" class="form-control" name="cantidad"  id="cantidad" required >
          </div>

          <div class="form-group mt-3">
          <label class="form-label">Url Imagen:</label>
          <input type="text" class="form-control" name="url_imagen" id="url_imagen" required >
          </div>

          <div class="form-group mt-3">
          <label class="form-label">Marca:</label>
          <input type="text" class="form-control" name="idmarca" id="idmarca" required >
          </div>

          <div class="modal-footer">
          <button  type="submit" class="btn btn-primary" >Guardar Cambios</button>
          </div>
      </form>
 
      </div>
      
    </div>
  </div>
</div>

  <div class="table-responsive container">
    <table class="table  table-hover align-middle contenido " id="tablaproductos">
      <thead>
        <tr>
          <th scope="col">Producto</th>
          <th scope="col">Categoria</th>
          <th scope="col" style="visibility:collapse; display:none;">IdCategoria</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Imagen</th>
          <th scope="col">Precio</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
          <th scope="col" style="visibility:collapse; display:none;">Url</th>
          <th scope="col" style="visibility:collapse; display:none;">Id</th>
        </tr>
      </thead>
      <tbody>
          <?php
          $strsql="SELECT productos.idproducto, productos.nombre_producto, categorias.nombre_categoria,productos.idcategoria, productos.descripcion, productos.url_imagen, productos.precio, productos.cantidad, productos.idmarca FROM `productos` INNER JOIN categorias ON categorias.idcategoria=productos.idcategoria";
          if($stmt = $mysqli->prepare($strsql)){
              $stmt->execute();
              $stmt->store_result();
              if($stmt->num_rows>0){
                  $stmt->bind_result($idproducto, $nombre_producto, $categoria, $idcategoria, $descripcion, $url_imagen, $precio, $cantidad, $idmarca);
                  while($stmt->fetch()){
                      ?>
                      <tr id="<?php echo $idproducto ?>">
                      <td scope="row"><?php echo $nombre_producto ?></td>
                      <td><?php echo $categoria ?></td>
                      <td style="visibility:collapse; display:none;"><?php echo $idcategoria ?></td>
                      <td><?php echo $descripcion ?></td>
                      <td>
                        <img class="img-fluid" src="<?php echo $url_imagen ?>" alt="" width="80px" height="80px">
                      </td>
                      <td><?php echo number_format($precio,2) ?></td>
                      <td><?php echo $cantidad ?></td>
                      <td>
                      <button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editar">Editar</button>
                      </td>
                      <td>
                        <a href="javascript:eliminar(<?php echo $idproducto ?>)" class="btn btn-danger" >Eliminar</a>
                      </td>
                      <td style="visibility:collapse; display:none;"><?php echo $url_imagen ?></td>
                      <td style="visibility:collapse; display:none;"><?php echo $idmarca ?></td>
                      <td style="visibility:collapse; display:none;"><?php echo $idproducto ?></td>
                    </tr>
                    <?php
                  }
              } else{
                  echo "No hay registros";
              }
          } else {
              echo "No se pudo preparar la consulta";
          }
          ?>

      </tbody>
    </table>
  </div>

  <script>
    function eliminar(idproducto)
    {
        var url = '<?php echo $urlweb ?>servicios/ws_admin_productos.php?accion=eliminar';

        fetch(url,
        {
            method: 'POST',
            body: JSON.stringify({
                "idproducto":idproducto
            })
        })
        .then((response) => response.json())
        .then( (data) => {
            alert(data.text);
            const row = document.getElementById(idproducto);
            row.remove();
        })
        .catch(console.error)
  }



 


  </script>

  <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
  <script>

    $('.editbtn').on('click',function(){
        $tr=$(this).closest('tr');
        var datos=$tr.children("td").map(function(){
          return $(this).text();
        });


        $('#update_id').val(datos[11]);
        $('#nombre_producto').val(datos[0]);
        $('#idcategoria').val(datos[2]);
        $('#descripcion').val(datos[3]);
        $('#precio').val(datos[5]);
        $('#cantidad').val(datos[6]);
        $('#url_imagen').val(datos[9]);
        $('#idmarca').val(datos[10]);
      });
  </script>

</div>

