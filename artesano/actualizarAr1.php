<?php
    include 'menu.php';?>
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
    <?php
    try{
        $sql="SELECT * FROM producto WHERE pk_codigo_pdto=".$_REQUEST['cod2'].";";
        $resultado=$conectar->prepare($sql);
        $resultado->execute(array());
        while($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
            ?>
    <form action="actualizarAr2.php?cod3=<?php echo $consulta['pk_codigo_pdto'];?>" method="post" enctype="multipart/form-data">
    <div class="container">
                <h2 style="text-align:center;color:white">Actualizacion de productos</h2>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="txtn" value="<?php echo $consulta['nombre_pdto'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                        <input class="form-control" id="exampleFormControlTextarea1" rows="3" name="txtd" value="<?php echo $consulta['desc_pdto'];?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Valor</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" value="<?php echo $consulta['valor_pdto'];?>" name="txtv">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" value="<?php echo $consulta['stock'];?>" name="txts">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success" value="Actualizar" name="btn1">
                    </div>
            </div>
    </form>
            <?php
        }
    }catch(Exception $e){
        die('Error al consultar productos'.$e->getMessage());
    }
    ?>
</body>
</html>