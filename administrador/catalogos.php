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
<?php include 'menu.php'; ?>
    <div class="container">
    <div class="container"><h2 style="color:white">Lista de catalogos</h2></div><br>
    <div class="container">
    <a href="insertarCatalogo.php" class="btn btn-success">Nuevo</a></div><br>
    <table class="table table-hover bg-light">
        <tr class="bg-dark" style="color:white">
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Administrar</th>
        </tr>
    <?php 
    try{
     $sql="SELECT * FROM catalogo ";
     $resultado=$conectar->prepare($sql);
     $resultado->execute(array());
     while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo  $consulta ['pk_id_catalogo'];?></td>
            <td><?php echo  $consulta ['nombre_catalogo'];?></td> 
            <td><a href="eliminarCatalogo1.php?cod=<?php echo $consulta['pk_id_catalogo'];?>" class="btn btn-danger">Eliminar</a></td></tr>
        <?php
     }
    }catch(Exception $e){
        die('Error al consultar productos'.$e->getMessage());
    }
    ?>
    </table>
</body>
</html>