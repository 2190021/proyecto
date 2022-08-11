<?php
global $mysqli;
global $urlweb;
?>
<div class="container" >
  <h2>Administrador de Categorias</h2>


  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertarc">
<i class="bi bi-plus-circle"></i> Añadir Categoria
</button>

<!-- Modal   Insertar-->
<div class="modal fade" id="insertarc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <form action="modulos/registrarc.php" method="POST" >

          <div class="form-group">
          <label class="form-label">Categoria:</label>
          <input type="text" class="form-control" name="nombre_categoria"  required >
          </div>

          <div class="form-group">
          <label class="form-label">Descripcion:</label>
          <input type="text" class="form-control" name="descripcion"  required >
          </div>

          <div class="form-group">
          <label class="form-label mt-3">Imagen:</label>
          <input type="text" class="form-control" name="url_imagen"  required >
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
<div class="modal fade" id="editarc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <form action="modulos/editarc.php" method="POST" >
          <input type="text" name="idcategoria"  id="update_id" style="visibility:collapse; display:none;">

          <div class="form-group">
          <label class="form-label">Categoria:</label>
          <input type="text" class="form-control" name="nombre_categoria" id="nombre_categoria" required >
          </div>


          <div class="form-group">
          <label class="form-label mt-3">Descripción:</label>
          <input type="text" class="form-control" name="descripcion" id="descripcion" required >
          </div>

          <div class="form-group mt-3">
          <label class="form-label">Url Imagen:</label>
          <input type="text" class="form-control" name="url_imagen" id="url_imagen" required >
          </div>


          <div class="modal-footer">
          <button  type="submit" class="btn btn-primary" >Guardar Cambios</button>
          </div>
      </form>
 
      </div>
      
    </div>
  </div>
</div>


   <div class="table-responsive  container">
      <table class="table table-hover align-middle contenido " id="tablacategorias">
        <thead>
          <tr>
            <th >Categoria</th>
            <th >Descripcion</th>
            <th >Fecha de Creacion</th>
            <th >Imagen</th>
            <th >Editar</th>
            <th >Eliminar</th>
            <th scope="col" style="visibility:collapse; display:none;">Url</th>
            <th scope="col" style="visibility:collapse; display:none;">Id</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $strsql="SELECT `idcategoria`, `nombre_categoria`, `descripcion`, `fecha_creacion`, `url_imagen` FROM `categorias`";
            if($stmt = $mysqli->prepare($strsql)){
                $stmt->execute();
                $stmt->store_result();
                if($stmt->num_rows>0){
                    $stmt->bind_result($idcategoria, $nombre_categoria, $descripcion, $fecha_creacion, $url_imagen);
                    while($stmt->fetch()){
                        ?>
                        <tr id="<?php echo $idcategoria ?>">
                        <td ><?php echo $nombre_categoria ?></td>
                        <td><?php echo $descripcion ?></td>
                        <td><?php echo $fecha_creacion ?></td>
                        <td>
                          <img class="img-fluid" src="<?php echo $url_imagen ?>" alt="" width="80px" height="80px">
                        </td>
                        <td>
                        <button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editarc">Editar</button>
                        </td>
                        <td>
                          <a href="javascript:eliminar(<?php echo $idcategoria ?>)" class="btn btn-danger">Eliminar</a>
                        </td>
                        <td style="visibility:collapse; display:none;"><?php echo $url_imagen ?></td>
                        <td style="visibility:collapse; display:none;"><?php echo $idcategoria ?></td>
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
    function eliminar(idcategoria)
    {
        var url = '<?php echo $urlweb ?>servicios/ws_admin_categorias.php?accion=eliminar';

        fetch(url,
        {
            method: 'POST',
            body: JSON.stringify({
                "idcategoria":idcategoria
            })
        })
        .then((response) => response.json())
        .then( (data) => {
            alert(data.text);
            const row = document.getElementById(idcategoria);
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


        $('#update_id').val(datos[7]);
        $('#nombre_categoria').val(datos[0]);
        $('#descripcion').val(datos[1]);
        $('#url_imagen').val(datos[6]);
      });
  </script>

</div>