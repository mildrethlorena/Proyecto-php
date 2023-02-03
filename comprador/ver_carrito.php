<?php 
include '../conectar.php';
include '../comprador/menuComprador.php';
include '../comprador/carrito.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/carrito.css">
    <title>Ver carrito</title>
</head>
<body>
     <div class="container">
    <h3>Listado de productos</h3>
    <?php
    if (!empty($_SESSION['CARRITO'])){
    ?>
    <table class=" container table table-light table-border">
        <tbody>
            <tr>
                <th whidth="40%">Descripcion</th>
                <th whidth="15%">Cantidad</th>
                <th whidth="20%">Precio</th>
                <th whidth="20%">Total</th>
                <th whidth="5%">Eliminar</th>
            </tr>
    <?php
    $total=0;
    foreach($_SESSION['CARRITO'] as $indice=>$producto){
    ?>
    <tr>
        <td whidth="40%"><?php echo $producto['NOMBRE'] ?></td>
        <td whidth="15%"><?php echo $producto['CANTIDAD'] ?></td>
        <td whidth="20%"><?php echo $producto['PRECIO'] ?></td>
        <td whidth="20%"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],0);?></td>
        <td whidth="5%">
            <form action="" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo $producto['ID']; ?>">
                <button class="btn btn-danger" type="submit" name="btnaccion"
                value="Eliminar">Eliminar</button>
            </form>
        </td>    
    </tr>
    <?php
    $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
    }
    ?>
    <tr>
        <td colspan="3" align="right"><h3>Total a pagar</h3></td>
        <td colspan="2"><h3> $<?php echo number_format($total,0)?></h3></td>
    </tr>
    </tbody>
    </table>
    <?php
    } else {
    ?>
    <div class="alert alert-success">
        No hay productos en el carrito
    </div>
    <?php
    }
    ?>
   
    <td colspan="5" >
                    <form action="pagar.php" method="post">
                         <div class="alert alert-success">
<!--                             <div class="form-group">
                                <label for="my-input">Correo de contacto: </label>
                                <input type="email" class="form-control" placeholder="Por favor, escriba su correo" name="email" required>
                            </div>  -->
                             <small id="email-help" class="form-text text-muted">Los productos se enviarán al correo <?php echo "$correo"?></small>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block" name="btnAccion" value="Proceder">Pagar</button>
                    </form>
                </td>
            </div>
</body>
</html>