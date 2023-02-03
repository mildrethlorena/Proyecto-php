<?php
  include 'menu.php';
		?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
    </head>
    <body>
    </header>
  <div class="container">
    <h2 style="text-align:center; color:white">Ingreso de productos</h2>
    <form action="" method="post" enctype="multipart/form-data" class="form">
        <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Nombre</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Digite el nombre." name="txtn" required>
</div>
<div class=" mb-3">
 <label for="formGroupExampleInput" class="form-label">Imagen</label>
  <input type="file" name="files[]"class="form-control" id="inputGroupFile02" required>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="txtd" required></textarea>
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Valor</label>
  <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Digite el valor." name="txtv" required>
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Stock</label>
  <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Digite el stock." name="txts" required >
</div>
<div class="mb-3">
<label for="formGroupExampleInput" class="form-label">Catalogo</label>
    <select class="form-select" aria-label="Default select example" name="txtc" required>
  <option selected>Seleccione un catalogo</option>
  <?php
                    $sql2="SELECT * FROM catalogo";
                    $resultado2=$conectar->prepare($sql2);
                    $resultado2->execute(array());
                    while ($consulta2=$resultado2->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <option value="<?php echo $consulta2['pk_id_catalogo'];?>"><?php echo $consulta2['nombre_catalogo'];?></option>
                        <?php
                    }
                        ?>
</select>
                </div>
<div class="mb-3">
  <input type="submit" class="btn btn-success" value="Ingresar" name="btn1">
</div>
    </form>
    </div>
    </body>
    </html>
    <?php
   
    if(isset($_POST['btn1'])) {
        $nombre=($_POST['txtn']);
        $descripcion=($_POST['txtd']);
        $valor=($_POST['txtv']);
        $stock=($_POST['txts']);
        $estado="disponible";
        $prov=$cedula;
        $catalogo=($_POST['txtc']);
        $contarArchivo = count($_FILES['files']['name']);

        $sql= "INSERT INTO producto (pk_codigo_pdto,nombre_pdto,desc_pdto,valor_pdto,stock,estado,catalogo,proveedor,imagenes) VALUES (NULL,?,?,?,?,?,?,?,?)";
        $resultado=$conectar->prepare($sql);
        for ($i=0; $i < $contarArchivo; $i++) {
            $nombreArchivo = $_FILES['files']['name'][$i];
            $carpeta = '../img/'.$nombreArchivo;
            $extencionArchivo = pathinfo($carpeta, PATHINFO_EXTENSION);
            $extencionArchivo = strtolower($extencionArchivo);
            $validarExtension = array("png","jpeg","jpg");
            if(in_array($extencionArchivo, $validarExtension)) {
                if(move_uploaded_file(
                    $_FILES['files']['tmp_name'][$i],$carpeta)
                    ) {
                        $resultado->execute(array($nombre,$descripcion,$valor,$stock,$estado,$catalogo,$prov,$carpeta));
                }
            }
        }
        ?>
        <script type="text/javascript">window.alert('informacion guardada con éxito');
        window.location="productosArtesano.php"</script>
        <?php
    }
    ?>
</body>
</html>