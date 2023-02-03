<?php include 'menuComprador.php'; ?>
<?php include 'carrito.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/verProducto2.css" type="text/css">
    <title>Artesanías las Américas</title>
</head>
<body>
                    <div class="wrapper ">
	                <div  class="outer shadow-lg p-3 mb-5 bg-body rounded">
	            	<div class="content animated fadeInLeft rounded rounded-3"  >
                    
            <?php 
            try {
                $id = $_GET["id"];
                $sql="SELECT * FROM producto INNER JOIN usuario ON pk_identificacion = proveedor INNER JOIN catalogo ON pk_id_catalogo = catalogo WHERE pk_codigo_pdto = $id";
                $resultado= $conectar->prepare($sql);
                $resultado->execute(array());
                while($consulta= $resultado->fetch(PDO::FETCH_ASSOC)) {
                    ?>                    
	            		<h1><?php echo $consulta['nombre_pdto'] ?></h1>
	            		<p><?php echo $consulta['desc_pdto'] ?></p>
	            		<p>Precio: $<?php echo $consulta['valor_pdto'] ?> pesos</p>
	            		<p><?php echo $consulta['stock'] ?> unidades.</p>
	            		<p>Estado: <?php echo $consulta['estado'] ?></p>  
	            		<p>Proveedor: <?php echo $consulta['nombre_user'] ?></p>  
	            		<p>Catalogo: <?php echo $consulta['nombre_catalogo'] ?></p>  
                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo $consulta['pk_codigo_pdto'] ?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo $consulta['nombre_pdto'] ?>">
                            <input type="hidden" name="desc" id="desc" value="<?php echo $consulta['desc_pdto'] ?>">
                            <input type="hidden" name="stock" id="stock" value="<?php echo $consulta['stock'] ?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo $consulta['valor_pdto'] ?>">
                            <input type="hidden" name="estado" id="estado" value="<?php echo $consulta['estado'] ?>">
                            <input type="hidden" name="catalogo" id="catalogo" value="<?php echo $consulta['catalogo'] ?>">
                            <input type="hidden" name="proveedor" id="proveedor" value="<?php echo $consulta['proveedor'] ?>">
                            <h6>Cantidad</h6>
                      <input type="number" class="form-control" name="cantidad" id="cantidad" width="10%" value="1" required><br>
                      <button class="btn btn-success" name="btnaccion" type="submit" value="Agregar" ><a href="./ver_carrito.php" "></a> Agregar al carrito</button>
                      <a class="btn btn-danger" href="inicioProductos.php">Volver</a>
                        </form>
	            	</div>
	            	<img  class="img3 rounded rounded-5 "src="../img/<?php echo $consulta['imagenes'] ?>" width="300px" class="animated fadeInRight">
	            </div>
        <?php
                }
                ?>

    <?php
            } catch (Exception $e) {
                die('Error al listar información del producto'.$e->getMessage());
            }
            ?>
    <script>
        function agregarProducto(){
            alert('Producto agregado al carrito');
        }
    </script>
</body>
</html>