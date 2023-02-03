<?php
include '../conectar.php';
try{
    if(isset($_POST['btn1'])){
    $nombre=$_POST['txtn'];
    $telefono=$_POST['txttel'];    
    $tipousuario=$_POST['txtu'];
    $direccion=$_POST['txtd'];
    $password=$_POST['txtp'];
    
    $sql="UPDATE usuario SET nombre_user=?,telefono_user=?,tipo_usuario=?,direccion_user=?,password_u=?  WHERE pk_identificacion=".$_REQUEST['cod3'].";";
    $resultado=$conectar->prepare($sql);
    $resultado->execute(array($nombre,$telefono,$tipousuario,$direccion,$password));
        }
        ?>
        <script type="text/javascript">window.alert('Usuario actualizado con exito!');
                                        window.location="usuarios.php"</script>
        <?php

}catch(Exception $e){
    die('error al actualizar un producto'.$e->getMessage());
}
?>