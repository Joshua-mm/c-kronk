<?php 

class Entrada {
    private $db;
    private $id;
    private $usuario_id;
    private $categoria_id;
    private $titulo;
    private $artista;
    private $descripcion;
    
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

    function getArtista() {
        return $this->artista;
    }

    function getDescripcion() {
        return $this->descripcion;
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

    function setArtista($artista) {
        $this->artista = $this->db->real_escape_string($artista); 
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion); 
    }

    public function getAllEntradas(){
        $sql = "SELECT * FROM entradas ORDER BY id DESC";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = $query;
        }
        return $result;
    }
    
    public function save(){
        $sql = "INSERT INTO entradas VALUES(null, {$this->getUsuario_id()}, {$this->getCategoria_id()}, '{$this->getTitulo()}', '{$this->getArtista()}', '{$this->getDescripcion()}', CURDATE())";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = true;
        }
//        echo $sql.'<br>';
//        echo $this->db->error;
//        die();
        return $result;
    }
    
    public function getOneById(){
        $sql = "SELECT * FROM entradas WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = $query->fetch_object();
        }
        return $result;
    }
    
    public function getAllCategory(){
        $sql = "SELECT e.*, c.nombre as 'catnombre' FROM entradas e "
                . "INNER JOIN categorias c ON c.id = e.categoria_id "
                . "WHERE e.categoria_id = {$this->getCategoria_id()} "
                . "ORDER BY id DESC";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = $query;
        }
        
        return $result;
    }
    
    public function remove_one(){
        $sql = "DELETE FROM entradas WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = true;
        }
        return $result;
    }    
       
    public function search($search){
        $sql = "SELECT * FROM entradas WHERE titulo LIKE '%{$search}%' OR artista LIKE '%$search%'";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = $query;
        }
        
        return $result;
    }

}