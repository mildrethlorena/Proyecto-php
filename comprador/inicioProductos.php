<?php 
include '../conectar.php';
include 'menuComprador.php';
include '../comprador/carrito.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../css/carrito.css"> -->

    <title>Document</title>
</head>
<body>
<br>
<div class="container">
      <center><div class="row row-cols-1 g-4">
          <div  style=" margin: 30px; width: 70%;  ">
        <div class="col-md-12 rounded-3">
      
          <h4>Filtrar por catalogo: </h4>
          <select id="filtro" class="form-select form-select-sm mb-4 " aria-label=".form-select-sm example" onchange="FiltrarCatalogo()">
            <option selected name="todos" value="todos">Todos</option>
           </center>
            <?php
            $sql= "SELECT * FROM catalogo";
            $resultado=$conectar->prepare($sql);
            $resultado->execute(array());
            while($consulta=$resultado->fetch(PDO::FETCH_ASSOC)) {
                $id_catalogo=$consulta['pk_id_catalogo'];
                $nombre_catalogo=$consulta['nombre_catalogo'];
                ?>
                <option value="<?php echo $id_catalogo ?>"><?php echo $nombre_catalogo?></option>
                <?php
            }
            ?>
          </select>
         </div>
        </div>
      <div id="catalogo" class="row"></div>
<script>
    FiltrarCatalogo();
    function FiltrarCatalogo(){
        var filtro = document.getElementById('filtro').value;
        var datos = new URLSearchParams()
        datos.append('filtro', filtro);
        fetch('../administrador/filtrarCatalogo.php', {
            method: 'POST',
            body: datos
        }).then(res => res.json())
        .then(res => {
          let row = '';
          res.forEach(element => {
            row+=` <div class="col-3 container2 hadow-lg p-4 mb-3  rounded ">
              <div class="card " height="90">
              <div class="card-body">
    <div class="imgBx">
    <img title="Titulo producto" alt="Titulo" class="card-img-top" src="../img/${element.imagenes}"  width="100" height="200">
    </div>
    <div class="contentBx">
      <h2>${element.nombre_pdto}</h2>
      <br>
      <div class="size">
        <h3>Precio : $ ${element.valor_pdto} pesos.</h3>
      </div>
      <div class="size">
        <h3>Proveedor : ${element.nombre_user}</h3>
      </div>
      <div class="color">
        <h3> Estado: ${element.estado}</h3>
        <form method="POST" action="verProducto.php">
                            <input type="hidden" name="id" id="id" value="${element.pk_codigo_pdto}">
                            <input type="hidden" name="nombre" id="nombre" value="${element.nombre_pdto}">
                            <input type="hidden" name="precio" id="precio" value="${element.valor_pdto}">
                            <input type="hidden" name="estado" id="estado" value="${element.estado}">      </div>
      <a class="btn btn-success" href="verProducto.php?id=${element.pk_codigo_pdto}">Ver</a>
    </div></form>
  </div>

</div></div></div><br>`;

            document.getElementById("catalogo").innerHTML = row;
          });
        });
    }
</script>
</body>
<style type="text/css">
  .container2 .card{
    background: rgb(250, 247, 247);
    border-radius: 20px;
  overflow: hidden;
  margin-bottom: 10px;
  margin-right: 10px;
  box-shadow: #111;
  padding: 10px 12px;
  border: 1px solid #cce7d0;
  border-radius: 25px;
  cursor: pointer;
  box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.02);
  margin: 5px 0;
  left: 20%;
  font-weight: 800;
  font-style: italic;
  }
  h3 {
    font-size: 15px;
    font-weight: 400;
  }
/*   h2 {
    font-family:Georgia, 'Times New Roman', Times, serif;
  }
  .card-img-top{
    font-family:'Times New Roman', Times, sans-serif;
  } */
</style>
</html>
