<?php
include '../conectar.php';
try{
     $sql="DELETE FROM producto WHERE pk_codigo_pdto=".$_REQUEST['cod2'].";";
     $resultado=$conectar->prepare($sql);
     $resultado->execute(array());
     ?>
     <script type="text/javascript">window.alert('Producto eliminado exitosamente.'); 
    window.location="productosArtesano.php"</script>
     <?php
}catch(Exception $e){
    die ('Error al eliminar un autor en el archivo eliminar.php'.$e->getMessage());
} 
?>