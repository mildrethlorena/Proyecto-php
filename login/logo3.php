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
    <link rel="stylesheet" href="./css/login1.css">
  

    <title>ingreso de usuarios</title>
  </head>
  <body>
    
  <section id="header">
        <a href="#"><img src="../images/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a  href="../index.php">Inicio</a></li>
                <li><a href="../login/logo3.php">Ingresar</a></li>
                <li><a href="../registro.php">Registrarse</a></li>
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
                <h1>Iniciar sesion</h1>
                  <div class="form-group">
                  <div class="inputContainer">
        <input type="number" class="input" placeholder="a" name="txtc" required>
        <label for="" class="label" style="color:rgb(90,90,90);" >Identificacion</label>
      </div>
      <div class="inputContainer">
        <input type="password" class="input" placeholder="a" name="txtp" required>
        <label for="" class="label" style="color:rgb(90,90,90);"> Contraseña </label>
      </div>
                  <button type="submit" class="btn btn-black submitBtn" name="btn1"  value="ingresar">Ingresar</button>
                  <button type="submit" class="btn btn-secondary text-link-light" ><a style="text-decoration:none; color:white"href="../registro.php">Registrarse</a></button>
               </form>
            </div>
         </div>
      </div>

</div>




  
    
    <?php
    include '../conectar.php';
    session_start();
    if(isset($_POST['btn1'])) {
        if(empty($_POST['btn1'])) {
            ?>
            <script type="text/javascript">window.alert('Cedula y contraseña obligatorias')</script>
            <?php
        }else{
            $cedula = $_POST['txtc'];
            $password = $_POST['txtp'];

            $sql1="SELECT * FROM usuario WHERE pk_identificacion=$cedula AND password_u=$password";
            $resultado=$conectar->prepare($sql1);
            $resultado->execute(array());
            while($consulta=$resultado->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION['nombre_user']=$consulta['nombre_user'];
                $_SESSION['cedula_user']=$consulta['pk_identificacion'];
                $_SESSION['tipo_user']=$consulta['tipo_usuario'];
                $_SESSION['correo_user']=$consulta['correo'];
            }
            $verificar=$resultado->rowCount();
            if($verificar > 0) {
                if($_SESSION['tipo_user'] =="administrador") { 
                    header('location:../administrador/productos.php');
                }
                if($_SESSION['tipo_user'] =="artesano") { 
                    header('location:../artesano/productosArtesano.php');
                }
                if($_SESSION['tipo_user'] =="comprador"){
                    header('location:../comprador/inicioProductos.php');
                }
            }else{
                ?>
                <script type="text/javascript">window.alert("Identificacion o contraseña erroneas.")</script>
                <?php
            }
        }
    }
    ?>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
 
       