<?php
include '../conectar.php';
session_start();
if(isset($_SESSION['nombre_user'])) {
	$nombre=$_SESSION['nombre_user'];
	$cedula=$_SESSION['cedula_user'];
	$tipo_usuario=$_SESSION['tipo_user'];
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
		<span class="navbar-brand mb-0 h1" style="text-decoration:none; color:white"><?php echo  "$tipo_usuario";?> <a style="text-decoration:none; color:white"><?php echo "$nombre" ?><img class="img2" src="../images/personas.png" alt="" srcset=""></a></span>
        <div>
            <ul id="navbar">
                <li><a href="productos.php">Productos</a>
                <li><a href="usuarios.php">Usuarios</a>
				<li><a href="ventas.php">Ventas</a>
				<li><a href="catalogos.php">Catalogos</a>


				<li><a href="../exit.php" class="btn btn-success">Salir</a></li>
            </ul>
			<tr>
		</tr>
        </div>
		

			<?php
		}
		?>
	</header>
    </body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>