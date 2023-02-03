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
    <?php
    try{
        $sql="SELECT * FROM usuario WHERE pk_identificacion=".$_REQUEST['cod2'].";";
        $resultado=$conectar->prepare($sql);
        $resultado->execute(array());
        while($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
            ?>
        <form action="actualizarUser2.php?cod3=<?php echo $consulta['pk_identificacion'];?>" method="post" enctype="multipart/form-data">
        <div class="container">
    <h2 style="text-align:center; color:white">Actualizacion de usuarios</h2>
        <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Nombre completo</label>
  <input type="text" class="form-control" id="formGroupExampleInput" name="txtn" value="<?php echo $consulta['nombre_user'] ?>" required>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Telefono</label>
  <input type="text" class="form-control"  id="formGroupExampleInput" name="txttel" value="<?php echo $consulta['telefono_user'] ?>" required>
</div>
<div class="mb-3">
<label for="formGroupExampleInput" class="form-label">Tipo de usuario</label>
    <select class="form-select" aria-label="Default select example" name="txtu" >
  <option value="<?php echo $consulta['tipo_usuario']?>"><?php echo $consulta['tipo_usuario']?></option>
  <option value="artesano">Artesano</option>
  <option value="comprador">Comprador</option>
  <option value="administrador">Administrador</option>
</select>
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Direccion</label>
  <input type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $consulta['direccion_user'] ?>" name="txtd">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Contraseña</label>
  <input type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $consulta['password_u']?>" name="txtp">
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