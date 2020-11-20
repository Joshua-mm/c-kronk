<?php

class Pedido {
    private $db;
    private $id;
    private $usuario_id;
    private $categoria_id;
    private $titulo;
    private $autor;
    private $estado;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    
    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
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

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    function setTitulo($titulo) {
        $this->titulo = $this->db->real_escape_string($titulo);
    }

    function setAutor($autor) {
        $this->autor = $this->db->real_escape_string($autor);
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    public function save(){
        $sql = "INSERT INTO pedidos VALUES(null, {$this->getUsuario_id()}, {$this->getCategoria_id()}, '{$this->getTitulo()}', '{$this->getAutor()}', '{$this->getEstado()}', CURDATE(), CURTIME())";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result= true;
        }
        
        return $result;
    }
    
    public function getOrdersByUser(){
        $sql = "SELECT * FROM pedidos WHERE usuario_id = {$this->getUsuario_id()} ORDER BY id DESC";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = $query;
        }
        
        return $result;
    }
    
    public function getAllOrders(){
        $sql = "SELECT * FROM pedidos ORDER BY id DESC";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = $query;
        }
        
        return $result;
    }
    
    public function removeOne(){
        $sql = "DELETE FROM pedidos WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = true;
        }
        echo $sql.'<br>'; 
        return $result;
    }
    
    public function removeAll(){
        $sql = "DELETE FROM pedidos";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = true;
        }
        
        return $result;
    }
    
    public function removeAllByUser(){
        $sql = "DELETE FROM pedidos WHERE usuario_id = {$this->getUsuario_id()}";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = true;
        }
        
        return $result;
    }
    
    public function showOrdersById(){
        $sql = "SELECT * FROM pedidos WHERE id = {$this->id}";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = $query;
        }
        
        return $query;
    }
    
    
    public function update(){
        $sql = "UPDATE pedidos SET estado = '{$this->getEstado()}' WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = true;
        }
//        echo $sql.'<br>';
//        echo $this->db->error;
        return $result;
    }
}
