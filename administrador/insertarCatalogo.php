<?php
    include 'menu.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Artesanías las Américas</title>
</head>
<body>
	</header>
    <div class="container">
    <h2 style="text-align:center; color:white">Ingreso de catalogos</h2>
    <form action="" method="post" enctype="multipart/form-data" class="form">
        <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Nombre</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Digite el nombre." name="txtn">
</div>
<div class="mb-3">
  <input type="submit" class="btn btn-success" value="Ingresar" name="btn1">
</div>
    </form>
    </div>
    <?php
   
    if(isset($_POST['btn1'])) {
        $nombre=$_POST['txtn'];

        $sql= "INSERT INTO catalogo (pk_id_catalogo,nombre_catalogo) VALUES ('',:nom)";
        $resultado=$conectar->prepare($sql);
        $resultado->execute(array(":nom"=>$nombre));

        ?>
        <script type="text/javascript">window.alert('informacion guardada con éxito');
        window.location="catalogos.php"</script>
        <?php
    }
    ?>
</body>
</html>