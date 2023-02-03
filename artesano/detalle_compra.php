<?php
    include 'menu.php';
?>

    <div class="container">
    <div class="container"><h2 style="color:white">Detalle de la compra</h2></div><br>
    <div class="container">
        <table class="table table-hover bg-light">
        <tr class="bg-dark" style="color:white">
            <th>Codigo compra</th>
            <th>Codigo detalle</th>
            <th>Comprador</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Total</th>
            <th>Producto</th>
        </tr>
        <?php 
    try{
        $id = $_GET['cod'];
        $sql="SELECT 
            dc.pk_id_detalle as codigo,
            u.nombre_user as comprador,
            dc.cantidad,
            dc.precio_unitario,
            dc.total,
            p.nombre_pdto,
            up.nombre_user as proveedor,
            c.pk_codigo_compra as codigo_compra
        FROM `detalle_compra` dc
        JOIN compra c on dc.fk_compra = c.pk_codigo_compra
        JOIN usuario u on c.fk_comprador = u.pk_identificacion
        JOIN producto p on dc.fk_pdto = p.pk_codigo_pdto
        JOIN usuario up on p.proveedor = up.pk_identificacion
        WHERE c.pk_codigo_compra = $id";
     $resultado=$conectar->prepare($sql);
     $resultado->execute(array());
     while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo  $consulta ['codigo_compra'];?></td>
            <td><?php echo  $consulta ['codigo'];?></td>
            <td><?php echo  $consulta ['comprador'];?></td>
            <td><?php echo  $consulta ['cantidad'];?></td>
            <td><?php echo  $consulta ['precio_unitario'];?></td>
            <td><?php echo  $consulta ['total'];?></td>
            <td><?php echo  $consulta ['nombre_pdto'];?></td>    
<!--             <td><?php echo  $consulta ['proveedor'];?></td> -->    
        </tr>
        <?php
     }
    }catch(Exception $e){
        die('Error al consultar productos'.$e->getMessage());
    }
    ?>
        </table>
    </div>
    </div>
</body>
</html>