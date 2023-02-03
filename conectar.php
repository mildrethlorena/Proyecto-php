<?php
try {
    $conectar=new PDO('mysql:host=localhost; dbname=artesania2','root','');
//    echo "comunicacion exitosa";
    
}catch(Exception $e){
    die('Error en la conexión'.$e->getMessage());
}

?>