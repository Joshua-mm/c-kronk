<?php

class Favorito {
    private $db;
    private $id;
    private $usuario_id;
    private $entrada_id;
    private $categoria_id;
    private $titulo;
    private $autor;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getEntrada_id(){
        return $this->entrada_id;
    }
    
    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getAutor() {
        return $this->autor;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }
    
    function setEntrada_id($entrada_id){
        $this->entrada_id = $entrada_id;
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    public function getFavoritoById(){
        $sql = "SELECT * FROM favoritos WHERE usuario_id = {$this->getUsuario_id()}";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = $query;
        }
        
        return $result;
    }
    
    public function save(){
        $sql = "INSERT INTO favoritos VALUES(null, {$this->getUsuario_id()}, {$this->getEntrada_id()}, {$this->getCategoria_id()}, '{$this->getTitulo()}', '{$this->getAutor()}', CURDATE())";
//        echo $sql; die();
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = true;
        }
        
        return $result;
    }
    
    public function remove_one(){
        $sql = "DELETE FROM favoritos WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = true;
        }
        
        return $result;
    }
}