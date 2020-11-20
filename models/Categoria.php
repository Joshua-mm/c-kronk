<?php

class Categoria {
    private $db;
    private $id;
    private $nombre;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    
    public function getAll(){
        $sql = "SELECT * FROM categorias";
        $query = $this->db->query($sql);
        if($query){
            $result = $query;
        }
        
        return $result;
    }
    
    public function getOne(){
        $sql = "SELECT * FROM categorias WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        if($query){
            $result = $query;
        }
        
        return $result;
    }
    
    public function save(){
        $sql = "INSERT INTO categorias VALUES(null, '{$this->getNombre()}')";
        $query = $this->db->query($sql); 
        $result = false;
        if($query){
            $result = true;
        }

        return $result;
    }
    
    public function edit(){
       $sql = "UPDATE categorias SET nombre = '{$this->getNombre()}' WHERE id = {$this->getId()}";
       $query = $this->db->query($sql);
       $result = false;
       if($query){
           $result = true;
       }
       
       return $result;
    }
    
    public function delete(){
        $sql = "DELETE FROM categorias WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = true;
        }
        
        return $result;
    }
    
    public function getCategoriesById(){
        $sql = "SELECT * FROM categorias WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = $query;
        }
        
        return $result;
    }

}

