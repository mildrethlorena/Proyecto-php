<?php
    include 'menu.php';
    ?>
	</header>
    <div class="container">
    <h2 style="text-align:center; color:white">Ingreso de usuarios</h2>
    <form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">N° identificacion</label>
  <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Digite su identificacion." name="txtc" required>
</div>
        <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Nombre completo</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Digite su nombre." name="txtn" required>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Telefono</label>
  <input type="text" class="form-control"  id="formGroupExampleInput" placeholder="Digite su teléfono" name="txttel" required>
</div>
<div class="mb-3">
<label for="formGroupExampleInput" class="form-label">Tipo de usuario</label>
    <select class="form-select" aria-label="Default select example" name="txtu">
  <option selected>Seleccione un tipo de usuario</option>
  <option value="artesano">Artesano</option>
  <option value="comprador">Comprador</option>
  <option value="administrador">Administrador</option>
</select>
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Direccion</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Digite su direccion." name="txtd">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Contraseña</label>
  <input type="password" class="form-control" id="formGroupExampleInput" placeholder="Digite su contraseña." name="txtp">
</div>
<div class="mb-3">
  <input type="submit" class="btn btn-success" value="Ingresar" name="btn1">
</div>
    </form>
    </div>
    <?php
   
    if(isset($_POST['btn1'])) {
      echo '<script> window.alert("funciona") </script>;';
        $cedula=$_POST['txtc'];
        $nombre=$_POST['txtn'];
        $telefono=$_POST['txttel'];
        $tipoUser=$_POST['txtu'];
        $direccion=$_POST['txtd'];
        $password=$_POST['txtp'];

        $sql="INSERT INTO usuario (pk_identificacion, nombre_user, telefono_user, tipo_usuario, direccion_user, password_u) VALUES (:ced,:nom,:tel,:user,:dir,:pass)";
        $resultado=$conectar->prepare($sql);
        $resultado->execute(array(":ced"=>$cedula,":nom"=>$nombre,":tel"=>$telefono,":user"=>$tipoUser,":dir"=>$direccion,":pass"=>$password));
        ?>
        <script type="text/javascript">window.alert('informacion guardada con éxito');
        window.location="usuarios.php"</script>
        <?php
    } 
    ?>
</body>
</html>