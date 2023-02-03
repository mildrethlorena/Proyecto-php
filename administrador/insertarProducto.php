<?php
  include 'menu.php';
		?>
	</header>
    <div class="container">
    <h2 style="text-align:center; color:white">Ingreso de productos</h2>
    <form action="" method="post" enctype="multipart/form-data" class="form">
        <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Nombre</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Digite el nombre." name="txtn">
</div>
<div class=" mb-3">
 <label for="formGroupExampleInput" class="form-label">Imagen</label>
  <input type="file" name="files[]"class="form-control" id="inputGroupFile02">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="txtd"></textarea>
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Valor</label>
  <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Digite el valor." name="txtv">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Stock</label>
  <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Digite el stock." name="txts">
</div>
<div class="mb-3">
<label for="formGroupExampleInput" class="form-label">Proveedor</label>
    <select class="form-select" aria-label="Default select example" name="txtp">
  <option selected>Seleccione un proveedor</option>
  <?php 
                    $sql="SELECT * FROM usuario WHERE tipo_usuario='artesano'";
                    $resultado=$conectar->prepare($sql);
                    $resultado->execute(array());
                    while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <option value="<?php echo $consulta['pk_identificacion'];?>"><?php echo $consulta['nombre_user'];?></option>
                        <?php
                    }
                    ?>
</select>
</div>
<div class="mb-3">
<label for="formGroupExampleInput" class="form-label">Catalogo</label>
    <select class="form-select" aria-label="Default select example" name="txtc">
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
    <?php
   
    if(isset($_POST['btn1'])) {
        $nombre=($_POST['txtn']);
        $descripcion=($_POST['txtd']);
        $valor=($_POST['txtv']);
        $stock=($_POST['txts']);
        $estado="disponible";
        $prov=($_POST['txtp']);
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
        window.location="productos.php"</script>
        <?php
    }
    ?>
</body>
</html>