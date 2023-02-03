<?php
    include '../conectar.php';
    session_start();
if(isset($_SESSION['nombre_user'])) {
	$nombre=$_SESSION['nombre_user'];
	$cedula=$_SESSION['cedula_user'];
	$tipo_usuario=$_SESSION['tipo_user'];
}else{
	$nombre="";
}
if($nombre==""){
	echo("<script type='text/javascript'>window.location='login.php'</script>");
}else{
	?>
			<nav class="navbar navbar-light bg-warning">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1"><?php echo "$tipo_usuario $nombre";?></span>
  </div>
</nav><br>
<?php
}
try{
     $sql="DELETE FROM producto WHERE pk_codigo_pdto=".$_REQUEST['cod2'].";";
     $resultado=$conectar->prepare($sql);
     $resultado->execute(array());
     ?>
     <script type="text/javascript">window.alert('Producto eliminado exitosamente.'); 
    window.location="productos.php"</script>
     <?php
}catch(Exception $e){
    die ('Error al eliminar un autor en el archivo eliminar.php'.$e->getMessage());
}
?>