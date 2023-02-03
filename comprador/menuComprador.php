<?php
include '../conectar.php';
session_start();
if(isset($_SESSION['nombre_user'])) {
	$nombre=$_SESSION['nombre_user'];
	$cedula=$_SESSION['cedula_user'];
	$tipo_usuario=$_SESSION['tipo_user'];
	$correo=$_SESSION['correo_user'];
}else{
	$nombre="";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Artesanias las Américas</title>
	<link rel="stylesheet" href="../css/menu-comprador.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
</head>
<body>
	<header>
		<?php
		if($nombre==""){
			echo("<script type='text/javascript'>window.location='../login/logo3.php'</script>");
		}else{
			?>
			<section id="header">
        <a href="#"><img  src="../images/logo.png" class="logo" alt=""></a>
		<span class="navbar-brand mb-0 h1" style="text-decoration:none; color:white"><?php echo  "$tipo_usuario";?> <a href="perfilComprador.php" style="text-decoration:none; color:white"><?php echo "$nombre" ?><img class="img2" src="../images/personas.png" alt="" srcset=""></a></span>
        <div>
            <ul id="navbar">
                <li><a href="inicioProductos.php">Productos</a></li>
                <li><a href="compras.php">Compras </a> </li>
				<li><a href="ver_carrito.php"><img class="img2" src="../images/carro.png" alt="" srcset="">(<?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);?>)</a></li>
				
				<li><a href="../exit.php" class="btn btn-success">Salir</a></li>
            </ul>
			<tr>
		</tr>
        </div>
		
<!--         <div id="mobile">
            <li><a href="cart.html"><i class="fas fa-shopping-bag"></i></a></li>
            <i id="bar" class="fas fa-outdent"></i>
        </div> -->
    </section>
			<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark menu">
  				<div class="container-fluid">
    				<a class="navbar-brand"><img src="../images/logo.png" alt="" srcset=""></a> 
    					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      						<span class="navbar-toggler-icon"></span>
						</button>
    				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      					<div class="navbar-nav">
        					<a class="nav-link active" aria-current="page" href="inicioProductos.php">Productos </a>
							<a class="nav-link active " aria-current="page" href="inicioProductos.php"><img class="img2" src="../images/carro.png" alt="" srcset="">(<?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);?>)</a>
							<a class="nav-link active" aria-current="page" href="compras.php">Compras </a>
      					</div>
    				</div>
  				</div>
  				<div class="container-fluid">
    				<span class="navbar-brand mb-0 h1"><?php echo  "$tipo_usuario";?> <a href="perfilComprador.php" style="text-decoration:none; color:white"><?php echo "$nombre" ?></a></span>
						
  				</div>
			</nav> -->
			<?php
		}
		?>
	</header>
    </body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>