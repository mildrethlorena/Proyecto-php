<?php 
include 'menu.php';
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil1.css">
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="icon" href=".../img/logo3.png" type="img">
    <title>Artesanías las Américas</title>
</head>

<body>
    <section class="seccion-perfil-usuario">
        
        <div class="perfil-usuario-header">
            
            <div class="perfil-usuario-portada">
                
            <?php
        try {
            $sql="SELECT * FROM usuario WHERE pk_identificacion=:ced";
            $resultado=$conectar->prepare($sql);
            $resultado->execute(array(":ced"=>$_SESSION['cedula_user']));
                while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <img class="img-usuario" src="../images/ceramica.png" alt="" srcset="">
            <div class="perfil-usuario-bio">
                <h3 class="titulo"><?php echo $consulta['nombre_user']; ?></h3>
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <li><i class="icono fas fa-map-signs"></i> Direccion: <?php echo $consulta['direccion_user']; ?></li>
                </ul>
                <ul class="lista-datos">
                    <li><i class="icono fas fa-phone-alt"></i> Telefono: <?php echo $consulta['telefono_user']; ?></li>
                </ul>
                <ul>
                    <li><a href="actualizarArtesano.php" class="btn btn-primary boton">Actualizar</a></li>
                </ul>   
            </div>
            <?php
                }
        } catch(Exception $e){
			die('Error al consultar un usuario, archivo perfilArtesano.php'.$e->getMessage());
		}
	?> 
        </div>
    </section>
</body>
</html>

