<?php

    include_once '../classes/api_abarrotes.php';
        
    $api = new ApiAbarrotes();

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $api->delete($id);

    }else{
        $api->error('Error al llamar a la API');
    }

?>


















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<br><br><br><br><br>
<body>
        <a href="../formulario.php">Regresar al index</a>
</body>
</html>