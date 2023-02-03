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

    // SI NOMBRE ESTA VACIO NO DEJA CONTINUAR EL CODIGO
    if($nombre=="") return;
    $filtro = $_POST['filtro'];
    if($filtro=="todos")  $sql="SELECT * FROM producto INNER JOIN usuario ON proveedor=pk_identificacion INNER JOIN catalogo ON pk_id_catalogo = catalogo WHERE proveedor=$cedula";
    else $sql="SELECT * FROM producto  INNER JOIN usuario ON pk_identificacion = proveedor INNER JOIN catalogo ON catalogo = pk_id_catalogo WHERE pk_id_catalogo = '$filtro' AND proveedor=$cedula";
    
    $resultado=$conectar->prepare($sql);
    $resultado->execute(array());
    $array = [];
    // GUARDA EN EL ARREGLO LA INFORMACIÓN Y LA RETORNA EN FORMATO JSON
    while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
        array_push($array,$consulta);
    }
    echo json_encode($array);
?>