<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Artesanias las Américas</title>
</head>
<body>
 <?php include 'menu.php' ?>
    <div class="container">
        <h3>Filtrar por catalogo:</h3>
    <select id="filtro" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="FiltrarCatalogo()">
        <option name="todos" value="todos">Todos</option>
        <?php
        $sql= "SELECT * FROM catalogo";
        $resultado=$conectar->prepare($sql);
        $resultado->execute(array());
        while($consulta=$resultado->fetch(PDO::FETCH_ASSOC)) {
            $id_catalogo=$consulta['pk_id_catalogo'];
            $nombre_catalogo=$consulta['nombre_catalogo'];
            ?>
            <option value="<?php echo $id_catalogo ?>"><?php echo $nombre_catalogo?></option>
            <?php
        }
        ?>
    </select>
    <div class="container"><h2 style="color:white">Lista de productos</h2></div><br>
    <div class="container">
    <a href="insertarProducto.php" class="btn btn-success">Nuevo</a></div><br>
    <table class="table table-hover bg-light">
        <thead>
            <tr class="bg-dark" style="color:white">
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Descripcion</th>
                <th>Valor</th>
                <th>Stock</th>
                <th>Estado</th>
                <th>Proveedor</th>
                <th>Catalogo</th>
                <th colspan="2" style="text-align:center">Administrar</th>
            </tr>
        </thead>
        <tbody id="cuerpo-tabla"></tbody>
    </table>
    <script>
        FiltrarCatalogo();
        function FiltrarCatalogo(){
            var filtro = document.getElementById('filtro').value;
            var datos = new URLSearchParams()
            datos.append('filtro', filtro);
            fetch('filtrarCatalogo.php', {
                method: 'POST',
                body: datos
            }).then(res => res.json())
            .then(res => {
                let row = '';
                res.forEach(element => {
                    row += `<tr>
                    <td>${element.pk_codigo_pdto}</td>
                    <td>${element.nombre_pdto}</td>
                    <td><img width="100px" heigth="100px" src="../img/${element.imagenes}" title="${element.imagenes}" /></td>
                    <td>${element.desc_pdto}</td>
                    <td>${element.valor_pdto}</td>
                    <td>${element.stock}</td>
                    <td>${element.estado}</td>
                    <td>${element.nombre_user}</td>
                    <td>${element.nombre_catalogo}</td>
                    <td><a href="eliminar1.php?cod=${element.pk_codigo_pdto}" class="btn btn-danger">Eliminar</a></td>
                    <td><a href="actualizar1.php?cod2=${element.pk_codigo_pdto}" class="btn btn-success">Actualizar</a></td>
                    </tr>`
                    //console.log(element);
                });
                document.getElementById('cuerpo-tabla').innerHTML = row;
            });
        }
    </script>
</body>
</html>