<?php

include_once 'consultas_abarrotes.php';

class ApiAbarrotes{

    function getAll(){
        $abarrote = new Abarrotes();
        $abarrotes = array();
        $abarrotes["items"] = array();

        $res = $abarrote->obtenerAbarrotes();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "id" => $row['id'],
                    "nombre" => $row['nombre'],
                    "categoria" => $row['categoria'],
                    "precio" => $row['precio'],
                    "descripcion" => $row['descripcion'],
                    "imagen" => $row['imagen'],
                    "stock" => $row['stock'],
                );
                array_push($abarrotes["items"], $item);
            }

            $JSON = json_encode($abarrotes);
            echo $JSON;

        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getById($id){
        $abarrote = new Abarrotes();
        $abarrotes = array();
        $abarrotes["items"] = array();

        $res = $abarrote->obtenerAbarrote($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                "id" => $row['id'],
                "nombre" => $row['nombre'],
                "categoria" => $row['categoria'],
                "precio" => $row['precio'],
                "descripcion" => $row['descripcion'],
                "imagen" => $row['imagen'],
                "stock" => $row['stock'],
            );

            array_push($abarrotes["items"], $item);

            $JSON = json_encode($abarrotes);
            echo $JSON;

        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function create($item){
        $abarrote = new Abarrotes();
        $res = $abarrote->nuevoAbarrote($item);
        $this->exito('Nuevo abarrote registrado');
    }

    function delete($id){
        $abarrote = new Abarrotes();
        $res = $abarrote->eliminarAbarrote($id);
        $this->exito('Abarrote eliminado');
    }

    function update($item, $id){
        $abarrote = new Abarrotes();

        $res = $abarrote->actualizarAbarrote($item, $id);
        $this->exito('Abarrote editado exitosamente');
    }

    function crearCuenta($nombre, $username, $password){
        $abarrote = new Abarrotes();
        $res = $abarrote->nuevaCuenta($nombre, $username, $password);
        $this->exito('Nueva cuenta registrada');
    }

    function login($username, $password){
        $abarrote = new Abarrotes();
        $res = $abarrote->iniciarSesion($username, $password);

        if($res->rowCount() == 1){
            $row = $res->fetch();
            $idUsuario = $row['id'];

            $logear = $abarrote->activarSesion($idUsuario);

            $this->exito('Inicio de sesion exitoso');
            //header('Location: ../formulario.php');
        }else{
            $this->exito('Error al iniciar sesion');
            //header('Location: ../index.php');
        }
    }

    function logout(){
        $abarrote = new Abarrotes();
        $res = $abarrote->cerrarSesion();
        $this->exito('Usted se ha deslogeado con exito');
        //header('Location: index.php');
    }

    function getCategorias(){
        $abarrote = new Abarrotes();
        $abarrotes = array();
        $abarrotes["items"] = array();

        $res = $abarrote->obtenerCategorias();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "categoria" => $row['categoria']
                );
                array_push($abarrotes["items"], $item);
            }

            $JSON = json_encode($abarrotes);
            echo $JSON;

        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getByCategoria($id_categoria){
        $abarrote = new Abarrotes();
        $abarrotes = array();
        $abarrotes["items"] = array();

        $res = $abarrote->obtenerPorCategoria($id_categoria);

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id" => $row['id'],
                    "nombre" => $row['nombre'],
                    "categoria" => $row['categoria'],
                    "id_categoria" => $row['id_categoria'],
                    "precio" => $row['precio'],
                    "descripcion" => $row['descripcion'],
                    "imagen" => $row['imagen'],
                    "stock" => $row['stock'],
                );
                array_push($abarrotes["items"], $item);
            }
            
            $JSON = json_encode($abarrotes);
            echo $JSON;

        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }




    

    function error($mensaje){
        echo json_encode(array('mensaje' => $mensaje)); 
    }

    function exito($mensaje){
        echo json_encode(array('mensaje' => $mensaje)); 
    }

    function printJSON($array){
        echo '<code>'.json_encode($array).'</code>';
    }

    
}

?>