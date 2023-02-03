<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Artesanias las Américas</title>
</head>
<body>
<?php include 'menu.php'; ?>
    <div class="container">
    <div class="container"><h2 style="color:white">Lista de compras</h2></div><br>
    <div class="container">
    <table class="table table-hover bg-light">
        <tr class="bg-dark" style="color:white">
            <th>Codigo</th>
            <th>Fecha</th>
            <th>Valor</th>
            <th>Correo</th>
            <th>Comprador</th>
            <th>Ver detalle</th>
        </tr>
    <?php 
    try{
     $sql="SELECT * FROM compra INNER JOIN usuario ON pk_identificacion = fk_comprador";
     $resultado=$conectar->prepare($sql);
     $resultado->execute(array());
     while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo  $consulta ['pk_codigo_compra'];?></td>
            <td><?php echo  $consulta ['fecha_compra'];?></td>
            <td><?php echo  $consulta ['valor_compra'];?></td>
            <td><?php echo  $consulta ['correo'];?></td>
            <td><?php echo  $consulta ['nombre_user'];?></td> 
            <td><a href="detalleCompra.php?cod=<?php echo $consulta ['pk_codigo_compra']?>" class="btn btn-success">Ver detalle</a></td>
        </tr>
        <?php
     }
    }catch(Exception $e){
        die('Error al consultar productos'.$e->getMessage());
    }
    ?>
    </table>
</body>
</html>