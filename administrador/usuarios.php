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
    <div class="container"><h2 style="color:white">Lista de usuarios</h2></div><br>
    <div class="container">
    <a href="insertarUsuario.php" class="btn btn-success">Nuevo</a></div><br>
    <table class="table table-hover bg-light">
        <tr class="bg-dark" style="color:white">
            <th>Cedula</th>
            <th>Nombre completo</th>
            <th>Telefono</th>
            <th>Tipo de usuario</th>
            <th>Direccion</th>
            <th>Contraseña</th>
            <th colspan="2" style="text-align:center">Administrar</th>
        </tr>
    <?php 
    try{
     $sql="SELECT * FROM usuario ";
     $resultado=$conectar->prepare($sql);
     $resultado->execute(array());
     while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo  $consulta ['pk_identificacion'];?></td>
            <td><?php echo  $consulta ['nombre_user'];?></td>
            <td><?php echo  $consulta ['telefono_user'];?></td>
            <td><?php echo  $consulta ['tipo_usuario'];?></td>
            <td><?php echo  $consulta ['direccion_user'];?></td>
            <td><?php echo  $consulta ['password_u'];?></td>  
            <td><a href="eliminarUser1.php?cod=<?php echo $consulta['pk_identificacion'];?>" class="btn btn-danger">Eliminar</a></td>
            <td><a href="actualizarUser1.php?cod2=<?php echo $consulta['pk_identificacion'];?>" class="btn btn-success">Actualizar</a></td></div>
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