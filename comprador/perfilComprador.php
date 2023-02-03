<?php 
include 'menuComprador.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
	<link rel="stylesheet" href="../css/perfil1.css">
    <title>Perfil comprador </title>
</head>
<body>
<section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header"> 
             
            <div class="perfil-usuario-portada" >
             
            <?php
        try {
            $sql="SELECT * FROM usuario WHERE pk_identificacion=:ced";
            $resultado=$conectar->prepare($sql);
            $resultado->execute(array(":ced"=>$_SESSION['cedula_user']));
                while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>
            </div>
        </div>
        <img class="img-usuario" src="../images/usuario.png" alt="" srcset=""></a>
        <div class="perfil-usuario-body">
            
            <div class="perfil-usuario-bio">
                <h3 class="titulo"><?php echo $consulta['nombre_user'];  ?></h3>
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <li><i class="icono fas fa-map-signs"></i> Direccion: <?php echo $consulta['direccion_user']; ?></li>
                </ul>
                <ul class="lista-datos">
                    <li><i class="icono fas fa-phone-alt"></i> Telefono: <?php echo $consulta['telefono_user']; ?></li>
                </ul>
                <ul>
                    <li><a href="actualizarComprador.php" class="btn btn-success boton">Actualizar</a></li>
                </ul>   
            </div>
            <?php
                }
        } catch(Exception $e){
			die('Error al consultar un usuario, archivo perfilComprador.php'.$e->getMessage());
		}
	?> 
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>