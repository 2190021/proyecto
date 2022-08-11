<?php
global $mysqli;
global $urlweb;
?>
<div class="container contenido" >
  <h2>Carrito de Compras </h2>

  <div class="table-responsive container">
    <table class="table  table-hover align-middle contenido ">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Imagen</th>
          <th scope="col">Precio</th>
          <th scope="col">Eliminar</th>

        </tr>
      </thead>
      <tbody>
          <?php
            $strsql="SELECT `idcarrito`, `nombre`, `descripcion`, `img`, `precio` FROM `carrito`";          
            if($stmt = $mysqli->prepare($strsql)){
              $stmt->execute();
              $stmt->store_result();
              if($stmt->num_rows>0){
                  $stmt->bind_result($idcarrito, $nombre, $descripcion, $img, $precio);
                  while($stmt->fetch()){
                      ?>
                      <tr id="<?php echo $idcarrito ?>">
                      <td scope="row"><?php echo $nombre ?></td>
                      <td><?php echo $descripcion ?></td>
                      <td>
                        <img class="img-fluid" src="<?php echo $img ?>" alt="" width="80px" height="80px">
                      </td>
                      <td><?php echo number_format($precio,2) ?></td>                   
                      <td>
                        <a href="javascript:eliminar(<?php echo $idcarrito ?>)" class="btn btn-danger" >Eliminar</a>
                      </td>
                    </tr>
                    <?php
                  }
              } else{
                  echo "El carrito está vacío";
              }
          } else {
              echo "No se pudo preparar la consulta";
          }
          ?>

      </tbody>
    </table>
  </div>

  <script>
    function eliminar(idcarrito)
    {
        var url = '<?php echo $urlweb ?>servicios/ws_admin_productos.php?accion=eliminarcarrito';

        fetch(url,
        {
            method: 'POST',
            body: JSON.stringify({
                "idcarrito":idcarrito
            })
        })
        .then((response) => response.json())
        .then( (data) => {
            alert(data.text);
            const row = document.getElementById(idcarrito);
            row.remove();
        })
        .catch(console.error)
  }



 


  </script>

 
</div>