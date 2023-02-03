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
    <div class="container">
    <table class="table bg-light" style="width:400px;margin:0 auto;">
    <?php
    $sql="SELECT * FROM usuario WHERE pk_identificacion=".$_REQUEST['cod'].";";
    $resultado=$conectar->prepare($sql);
    $resultado->execute(array());
    while($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td colspan="2" style="text-align:center">Esta seguro de eliminar el usuario <?php echo $consulta['nombre_user'] ?>?</td>
        </tr>
        <tr>
            <td style="text-align:center"><a href="eliminarUser2.php?cod2=<?php echo $consulta['pk_identificacion'];?>." class="btn btn-success">Si</a></td>
            <td style="text-align:center"><a href="usuarios.php" class="btn btn-danger">No</a></td>
        </tr>
        <?php
    }
    ?>
    </table>
    </div>
</body>
</html>
