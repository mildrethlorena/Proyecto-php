<?php
$mensaje="";
if(isset($_POST["btnaccion"])){
    switch($_POST["btnaccion"]){
        case 'Agregar':
            //este pertenece al ID
            if (is_numeric($_POST['id'])){
                $ID=$_POST['id'];
                $mensaje.="OK... ID correcto=".$ID."<br>";
            }else {
                $mensaje="UPS... ID erroreno...";
            }
            //este pertenece al NOMBRE
            if (is_string($_POST['nombre'])){
                $NOMBRE=$_POST['nombre'];
                $mensaje.="OK... NOMBRE correcto=".$NOMBRE."<br>";
            }else {
                $mensaje="UPS... NOMBRE erroreno...";
            }
            //este pertenece al precio
            if (is_numeric($_POST['precio'])){
                $PRECIO=$_POST['precio'];
                $mensaje.="OK... PRECIO correcto=".$PRECIO."<br>";
            }else {
                $mensaje="UPS... PRECIO erroreno...";
            }
            //este pertenece a la cantidad
            if (is_numeric($_POST['cantidad'])){
                $CANTIDAD=$_POST['cantidad'];
                $mensaje.="OK... CANTIDAD correcto=".$CANTIDAD."<br>";
            }else {
                $mensaje="UPS... CANTIDAD erroreno...";
            }

            //este pertenece a la cantidad
            if (is_numeric($_POST['proveedor'])){
                $PROVEEDOR=$_POST['proveedor'];
                $mensaje.="OK... PROVEEDOR correcto=".$PROVEEDOR."<br>";
            }else {
                $mensaje="UPS... PROVEEDOR erroreno...";
            }
            
            
            //Esta parte pertenece al CARRITO
            if (!isset($_SESSION['CARRITO'])) {
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'PRECIO'=>$PRECIO,
                    'CANTIDAD'=>$CANTIDAD,
                    'PROVEEDOR'=>$PROVEEDOR
                );
                $_SESSION['CARRITO'][0]=$producto;
            }else {
                $numeroproductos=count($_SESSION['CARRITO']);
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'PRECIO'=>$PRECIO,
                    'CANTIDAD'=>$CANTIDAD,
                    'PROVEEDOR'=>$PROVEEDOR
                );
                $_SESSION['CARRITO'][$numeroproductos]=$producto;
            }
            //$mensaje=print_r($_SESSION,true);
        break;
        case 'Eliminar':
            if(is_numeric($_POST['id'])) {
                $ID=$_POST['id'];
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    if($producto['ID']==$ID){
                        unset($_SESSION['CARRITO'][$indice]);
                        echo "<script>alert('Elemento eliminado del carrito...')</script>";
                    }
                }
            }else{
                $mensaje.="Ups, dato errróneo";
            }
            break;
    }
}
?>