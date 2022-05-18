<?php
    include_once '../classes/api_abarrotes.php';

    $api = new ApiAbarrotes();

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        if(is_numeric($id)){
            $api->getById($id);
        }else{
            $api->error('El id es incorrecto');
        }
    }else{
        $api->getAll();
        
    }
    
?>