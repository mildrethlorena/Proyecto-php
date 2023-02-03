<?php
    include 'menuComprador.php';
		?>
	</header>
    <div class="container">
    <div class="container"><h2 style="color:white">Historial de ventas</h2></div><br>
    <div class="container">
    <table class="table table-hover bg-light">
        <tr class="bg-dark" style="color:white">
            <th>Codigo</th>
            <th>Fecha</th>
            <th>Valor</th>
            <th>Correo</th>
<!--             <th>Comprador</th> -->
            <th>Ver detalle</th>
        </tr>
    <?php 
    try{
     $sql="SELECT 
     c.pk_codigo_compra as codigo_compra,
     c.fecha_compra,
     c.valor_compra,
     c.correo,
     u.nombre_user as comprador
     FROM `detalle_compra` dc
     JOIN compra c on dc.fk_compra = c.pk_codigo_compra
     JOIN usuario u on c.fk_comprador = u.pk_identificacion
     JOIN producto p on dc.fk_pdto = p.pk_codigo_pdto
     WHERE u.pk_identificacion = $cedula
     GROUP BY c.pk_codigo_compra";
     $resultado=$conectar->prepare($sql);
     $resultado->execute(array());
     while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
        <td><?php echo  $consulta ['codigo_compra'];?></td>
            <td><?php echo  $consulta ['fecha_compra'];?></td>
            <td><?php echo  $consulta ['valor_compra'];?></td>
            <td><?php echo  $consulta ['correo'];?></td>
<!--             <td><?php echo  $consulta ['comprador'];?></td>  -->
            <td><a href="detalle_compra.php?cod=<?php echo $consulta ['codigo_compra']?>" class="btn btn-success">Ver detalle</a></td>
        </tr>
        <?php
     }
    }catch(Exception $e){
        die('Error al consultar productos'.$e->getMessage());
    }
    ?>
    </table>
</body>
</html>