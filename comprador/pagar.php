<?php 
    include 'carrito.php';
    include 'menuComprador.php';
    ?>
     
<?php 

    $total=0;
    if($_POST){
        foreach ($_SESSION['CARRITO'] as $indice => $producto) {
            $total = $total+($producto['PRECIO']*$producto['CANTIDAD']);
        }
        $sql3="INSERT INTO compra (pk_codigo_compra,fecha_compra,valor_compra,correo,fk_comprador) VALUES (NULL,NOW(),:valor,:correo,:comprador);";
        $resultado3=$conectar->prepare($sql3);
        $resultado3->execute(array(":valor"=>$total,":correo"=>$correo,":comprador"=>$cedula));

        $idventa = $conectar->lastInsertId();
        foreach ($_SESSION['CARRITO'] as $indice => $producto) {
            $sql4="INSERT INTO detalle_compra (pk_id_detalle,cantidad,precio_unitario,total,fk_pdto,fk_compra) VALUES (NULL, :cantidad, :precio_u, :total, :id_producto, :id_venta);";
            $resultado4=$conectar->prepare($sql4);
            $resultado4->execute(array(":cantidad"=>$producto['CANTIDAD'],":precio_u"=>$producto['PRECIO'],":id_producto"=>$producto['ID'],":total"=>($producto['CANTIDAD']*$producto['PRECIO']),":id_venta"=>$idventa));
        }
    }
?>
<div class=" container cols-3 coshadow-lg p-3 mb-5 bg-body rounded">

<div class="jumbotron">
    <h1 class="display-4">Paso final!</h1>
    <hr class="my-4">
    <p class="lead">Tu compra ha sido registrada...
        <h4><?php echo number_format($total)." pesos."; ?></h4>
    </p>
    <p>Los productos se listarán para su envío</p>
    <a  class="btn btn-success" href="./inicioProductos.php">Volver<?php unset($_SESSION['CARRITO']);?></a>
</div>
</div>