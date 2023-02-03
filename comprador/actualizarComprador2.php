<?php
include '../conectar.php';
try{
    if(isset($_POST['btn1'])){
        $nombre=$_POST['txtn'];
        $telefono=$_POST['txttel'];
        $direccion=$_POST['txtd'];

        $sql= "UPDATE usuario SET nombre_user=?,telefono_user=?,direccion_user=? WHERE pk_identificacion=".$_REQUEST['cod'].";";
        $resultado=$conectar->prepare($sql);
        $resultado->execute(array($nombre,$telefono,$direccion));

        ?>
        <script type="text/javascript">window.alert('Usuario actualizado con exito!');
                                        window.location="perfilComprador.php"</script>
        <?php

    }
}catch(Exception $e){
    die('error al actualizar un producto'.$e->getMessage());
}
?>