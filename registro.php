<?php 
    include 'conectar.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="./css/registro-1.css">
  

    <title>ingreso de usuarios</title>
  </head>
  <body>
    
  <section id="header">
        <a href="#"><img src="./images/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a  href="./index.php">Inicio</a></li>
                <li><a href="login/logo3.php">Ingresar</a></li>
                <li><a href="./registro.php">Registrarse</a></li>
            </ul>
        </div >

    </section>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<center>
<div class="sidenav" >
         <div class="login-main-text">
            <h1>Artesanias<br>las americas</h1>
            <p>Disfruta De La Divercidad De Colombia Y Conce Esta Cultura.</p>
            <img class="imagen1" src="./images/h.png" alt="" srcset="">
         </div>
      </div></center>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action="" class="form" method="post">
                <h1>Registro de Usuarios</h1>
                  <div class="form-group">
                  <div class="inputContainer">
                    <input type="number" class="input" placeholder="a" name="txtc" required>
                    <label for="" class="label" style="color:rgb(90,90,90);" >Identificacion</label>
                  </div>

                 <div class="inputContainer">
                   <input type="text" class="input" placeholder="a" name="txtn" required>
                   <label for="" class="label" style="color:rgb(90,90,90);">Nombre Completo </label>
                 </div>

                 <div class="inputContainer">
                   <input type="text" class="input" placeholder="a" name="txttel" required>
                   <label for="" class="label" style="color:rgb(90,90,90);">Telefono</label>
                 </div>

                  <div class="inputContainer">
                    <input type="email" class="input" placeholder="a" name="txtcorr" required>
                    <label for="" class="label" style="color:rgb(90,90,90);">Correo electrónico</label>
                  </div>

                 <div class="inputContainer">
                   <input type="text" class="input" placeholder="a" name="txtd" required>
                   <label for="" class="label" style="color:rgb(90,90,90);"> Direccion </label>
                 </div>

                <div class="inputContainer">
                  <input type="password" class="input" placeholder="a" name="txtp" required>
                  <label for="" class="label" style="color:rgb(90,90,90);"> Contraseña </label>
                </div>
                 <input type="submit" class="submitBtn" name="btn1" value="Registrar">
              </div>
         </form>
       </div>
     </div>
   </div>
</div>





  <?php 
     if(isset($_POST['btn1'])) {
         $cedula=$_POST['txtc'];
         $nombre=$_POST['txtn'];
         $telefono=$_POST['txttel'];
         $correo=$_POST['txtcorr'];
         $tipoUser='comprador';
         $direccion=$_POST['txtd'];
         $password=$_POST['txtp'];
 
         $sql="INSERT INTO usuario (pk_identificacion, nombre_user, telefono_user, correo, tipo_usuario, direccion_user, password_u) VALUES (:ced,:nom,:tel,:corr,:user,:dir,:pass)";
         $resultado=$conectar->prepare($sql);
         $resultado->execute(array(":ced"=>$cedula,":nom"=>$nombre,":tel"=>$telefono,":corr"=>$correo,":user"=>$tipoUser,":dir"=>$direccion,":pass"=>$password));
         ?>
         <script type="text/javascript">window.alert('informacion guardada con éxito');
         window.location="login/logo3.php"</script>
         <?php
     }
     ?>
     <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</body>
</html>
<style type="text/css">
      
