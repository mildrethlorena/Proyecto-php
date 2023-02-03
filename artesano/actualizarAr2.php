<?php
include '../conectar.php';
try{
    if(isset($_POST['btn1'])){
        $nombre=$_POST['txtn'];
        $descripcion=$_POST['txtd'];
        $valor=$_POST['txtv'];
        $stock=$_POST['txts'];
        $estado='disponible';

        $sql= "UPDATE producto SET nombre_pdto=?,desc_pdto=?,valor_pdto=?,stock=?,estado=? WHERE pk_codigo_pdto=".$_REQUEST['cod3'].";";
        $resultado=$conectar->prepare($sql);
        $resultado->execute(array($nombre,$descripcion,$valor,$stock,$estado));

        ?>
        <script type="text/javascript">window.alert('Producto actualizado con exito!');
                                        window.location="productosArtesano.php"</script>
        <?php

    }
}catch(Exception $e){
    die('error al actualizar un producto'.$e->getMessage());
}
?>