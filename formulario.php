<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos-index.css">
    <title>API abarrotes</title>
</head>
<body>

    <div class="container">
        <h4 class="text-center" id="user_message"></h4>
        <h1 class="titulo">API abarrotes</h1>
        <a href="models/logout.php">Cerrar sesión</a>
        <br><br>
        <form action="models/create.php" method="POST">
            <div class="form-group">
                <label>Nombre del producto</label>
                <input type="text" class="form-control" name="nombre" id="" reuired autocomplete= off>
            </div>
            <div class="form-group">
                <label>Categoria del producto</label>
                <input type="text" class="form-control" name="categoria" id="" required autocomplete= off>
            </div>
            <div class="form-group">
                <label>Precio del producto</label>
                <input type="text" class="form-control" name="precio" id="" required autocomplete= off>
            </div>
            <div class="form-group">
                <label>Descripcion del producto</label>
                <input type="text" class="form-control" name="descripcion" id="" required autocomplete= off>
            </div>
            <div class="form-group">
                <label for="product_description">Stock del producto</label>
                <input type="text" class="form-control" name="stock" id="" required autocomplete= off>
            </div>
            <div class="form-group">
                <label>Foto del producto</label>
                <input type="text" class="form-control" name="imagen" id="" required autocomplete= off>
            </div>

            <div>
                <input type="submit" value="Guardar" class="btn btn-success">
            </div>
        </form>
    </div>
    
    <br><br><br>.
    <?php

    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );  

    $api_url = 'https://proyecto-idts6.epizy.com/models/get.php';
    //$api_url = 'http://localhost:84/API-ios/models/get.php';
    $json_data = file_get_contents($api_url, false, stream_context_create($arrContextOptions));
    $datos = json_decode($json_data)->items;

    ?>
    <table class="container table-dark table-productos">
      <thead>
        <tr>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
        <?php 
            foreach($datos as $data) { 
        ?>
            <tr id="fila-<?php echo ($data->id) ?>">
                <td><?php echo ($data->nombre) ?></td>
                <td><?php echo ($data->categoria) ?></td>
                <td>$<?php echo ($data->precio) ?></td>
                <td><?php echo ($data->descripcion) ?></td>
                <td><?php echo ($data->stock) ?></td>
                <td><img src="<?php echo ($data->imagen)?>" height="100px" width="100px"></td>
                <td>
                    <a href="form_update.php?id=<?php echo ($data->id)?>" class="btn btn-primary">Actualizar</a>
                    <a href="models/delete.php?id=<?php echo ($data->id)?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php
            }
        ?>
      </thead>
    </table>

</body>

</html>