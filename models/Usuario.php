<?php

class Usuario {
    
    private $db;
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $about;
    private $imagen;
    private $rol;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function getAbout(){
        return $this->about;
    }
    
    function getImagen() {
        return $this->imagen;
    }

    function getRol() {
        return $this->rol;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos) {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password) {
        $this->password = $password;
    }
    
    function setAbout($about){
        $this->about = $this->db->real_escape_string($about);
    }

    function setImagen($imagen) {
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    function setRol($rol) {
        $this->rol = $rol;
    }
    

    public function save(){
        $sql = "INSERT INTO usuarios VALUES(null, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', '{$this->getAbout()}', '{$this->getImagen()}', 'user', CURDATE())";
        
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        
        return $result;
    }
    
    public function login(){
        $result = false;
        $email = $this->email;
        $password = $this->password;
        
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);
        
        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();
            
            $verify = password_verify($password, $usuario->password);
            
            if($verify){
                $result = $usuario;
            }
        }
        
        return $result;
    }
    
    public function myProfile(){
        $sql = "SELECT * FROM usuarios WHERE id = {$this->getId()}";
        $show = $this->db->query($sql);
        $result = false;
        if($show){
            $result = $show;
        }
        
        return $result;
    }
    
    public function edit(){
        $sql = "UPDATE usuarios SET nombre = '{$this->getNombre()}', apellidos = '{$this->getApellidos()}', email = '{$this->getEmail()}', about = '{$this->getAbout()}', imagen = '{$this->getImagen()}' WHERE id = {$this->getId()}";
        $edit = $this->db->query($sql);
        $result = false;
        if($edit){
            $result = true;
        }
        
        return $result;
    }
    
    public function showAllDataFromUsuario(){
        $sql = "SELECT * FROM usuarios WHERE id = {$this->getId()}";
        $show = $this->db->query($sql);
        $result = false;
        if($show){
            $usuario = $show->fetch_object();
        }
        
        return $usuario;
    }
    
    public function showAllUsers(){
        $sql = "SELECT * FROM usuarios";
        $query = $this->db->query($sql);
        $result = false;
        if($query){
            $result = $query;
        }
        
        return $result;
    }
    
    public function removeOne(){
        $sql = "DELETE FROM usuarios WHERE id = {$this->getId()}";
        $delete = $this->db->query($sql);
        $result = false;
        if($delete){
            $result = true;
        }
//        echo $sql."<br>";
//        echo $this->db->error; die();
        return $result;
    }
    
}
