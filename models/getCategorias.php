<?php
    include_once '../classes/api_abarrotes.php';

    $api = new ApiAbarrotes();

    if(isset($_GET['id_categoria'])){
        $id_categoria = $_GET['id_categoria'];

        if(is_numeric($id_categoria)){
            $api->getByCategoria($id_categoria); 
        }else{
            $api->error('El id es incorrecto');
        }
    }else{
        $api->getCategorias();       
    }
?>