<?php

include_once 'db.php';

class Abarrotes extends DB{
    
    function obtenerAbarrotes(){
        $query = $this->connect()->query('SELECT * FROM productos');
        return $query;
    }

    function obtenerAbarrote($id){
        $query = $this->connect()->prepare('SELECT * FROM productos WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

    function nuevoAbarrote($abarrote){
        $query = $this->connect()->prepare('INSERT INTO productos(nombre,categoria,precio,descripcion,stock,imagen) VALUES(:nombre,:categoria,:precio,:descripcion,:stock,:imagen)');
        $query->execute(['nombre' => $abarrote['nombre'],'categoria' => $abarrote['categoria'],'precio' => $abarrote['precio'],'descripcion' => $abarrote['descripcion'],'stock' => $abarrote['stock'],'imagen' => $abarrote['imagen']]);
        return $query;
    }

    function eliminarAbarrote($id){
        $query = $this->connect()->prepare('DELETE FROM productos WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

    function actualizarAbarrote($abarrote, $id){
        $query = $this->connect()->prepare('UPDATE productos SET nombre=:nombre, categoria=:categoria, precio=:precio, descripcion=:descripcion, stock=:stock, imagen=:imagen WHERE id=:id');
        $query->execute(['nombre' => $abarrote['nombre'],'categoria' => $abarrote['categoria'],'precio' => $abarrote['precio'],'descripcion' => $abarrote['descripcion'],'stock' => $abarrote['stock'],'imagen' => $abarrote['imagen'], 'id' => $id]);
        return $query;
    }

    function nuevaCuenta($nombre, $username, $password){
        $query = $this->connect()->prepare('INSERT INTO usuarios(nombre,username,password) VALUES(:nombre,:username,:password)');
        $query->execute(['nombre' => $nombre,'username' => $username,'password' => $password]);
        return $query;
    }

    function iniciarSesion($username, $password){

        $sql = $this->connect()->prepare("UPDATE usuarios SET logeado='0' WHERE logeado = '1'");
        $sql->execute();

        $query = $this->connect()->prepare('SELECT id FROM usuarios WHERE username = :username AND password = :password');
        $query->execute(['username' => $username,'password' => $password]);
        return $query;
    }

    function activarSesion($idUsuario){
        $query = $this->connect()->prepare('UPDATE usuarios SET logeado="1" WHERE id=:idUsuario');
        $query->execute(['idUsuario' => $idUsuario]);
        return $query;
    }
    
    function cerrarSesion(){
        $query = $this->connect()->prepare('UPDATE usuarios SET logeado="0" WHERE logeado="1"');
        $query->execute();
        return $query;
    }

    function obtenerCategorias(){
        $query = $this->connect()->prepare('SELECT DISTINCT categoria FROM productos');
        $query->execute();
        return $query;
    }

    function obtenerPorCategoria($id_categoria){
        $query = $this->connect()->prepare('SELECT * FROM productos WHERE id_categoria = :id_categoria');
        $query->execute(['id_categoria' => $id_categoria]);
        return $query;
    }
}

?>