<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos-index.css">
    <title>UPDATE</title>
</head>
<body>
    <br><br>
    <?php

        $id = $_GET["id"];

        $url = 'http://localhost:84/API-ios/models/get.php?id=';
        $api = $url . $id;

        $json_data = file_get_contents($api);
        $datos = json_decode($json_data)->items;

    ?>

    
    <div class="container">
        <h1 class="text-center">Actualización de API abarrotes</h1>
        <br><br>

        <?php foreach($datos as $data) { ?>

        <form action="models/update.php" method="POST">
            <div class="form-group">
                <label for="product_name">Nombre del producto</label>
                <input type="text" class="form-control" name="nombre" id="" value="<?php echo ($data->nombre) ?>" reuired autocomplete= off>
            </div>
            <div class="form-group">
                <label>Categoria del producto</label>
                <input type="text" class="form-control" name="categoria" id="" value="<?php echo ($data->categoria) ?>" required autocomplete= off>
            </div>
            <div class="form-group">
                <label for="product_price">Precio del producto</label>
                <input type="text" class="form-control" name="precio" id="" value="<?php echo ($data->precio) ?>" required autocomplete= off>
            </div>
            <div class="form-group">
                <label for="product_description">Descripcion del producto</label>
                <input type="text" class="form-control" name="descripcion" id="" value="<?php echo ($data->descripcion) ?>" required autocomplete= off>
            </div>
            <div class="form-group">
                <label for="product_description">Stock del producto</label>
                <input type="text" class="form-control" name="stock" id="" value="<?php echo ($data->stock) ?>" required autocomplete= off>
            </div>
            <div class="form-group">
                <label for="product_img">Foto del producto</label>
                <input type="text" class="form-control" name="imagen" id="imagen" value="<?php echo ($data->imagen) ?>" required autocomplete= off>
            </div>

            <input type="hidden" name="id" value="<?php echo $id ?>">

            <div>
                <input type="submit" value="Actualizar" class="btn btn-primary">
            </div>
        </form>

        <?php } ?>    

    </div>

</body>

</html>