<?php

require_once 'models/Categoria.php';
require_once 'models/Entrada.php';

class CategoriaController {
    
    public function gestionar(){
        Utils::isAdmin();
        $categorias = new Categoria();
        $categoria = $categorias->getAll();
        if($categoria){
            $_SESSION['categories'] = $categoria;
            require_once 'views/categoria/manageCategories.php';
        }
        
    }
    
    public function add(){
        Utils::isAdmin();
        require_once 'views/categoria/add.php';
    }
    
    public function agregar(){
        Utils::isAdmin();
        if(isset($_POST)){
            $nombre = isset($_POST['name']) ? $_POST['name'] : false;
            if($nombre && !empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
                $categoria = new Categoria();
                $categoria->setNombre($nombre);
                $save = $categoria->save();
                if($save){
                    $_SESSION['add_category'] = true;
                }else{
                    $_SESSION['error_add_category'] = true;
                }
            }else{
                $_SESSION['error_add_category'] = true;
            }
        }else{
            $_SESSION['error_add_category'] = true;
        }
        
        echo "<script>window.location='" . base_url . "categoria/gestionar'</script>";
    }
    
    public function edit(){
        if(isset($_GET['id'])){
            require_once 'views/categoria/edit.php';
        }
        
    }
    
    public function editar(){
        Utils::isAdmin();
        if(isset($_POST)){
            $nombre = isset($_POST['name']) ? $_POST['name'] : false;
            $id = isset($_GET['id']) ? $_GET['id'] : false;
            if($nombre && !empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
                $nombre_validado = true;
            }
            
            if($id && is_numeric($id)){
                $id_validada = true;
            }
            if($nombre_validado && $id_validada){
                $categoria = new Categoria();
                $categoria->setNombre($nombre);
                $categoria->setId($id);
                $edit = $categoria->edit();
                if($edit){
                    $_SESSION['add_category'] = true;
                }else{
                    $_SESSION['error_add_category'] = true;
                }
            }else{
                $_SESSION['error_add_category'] = true;
            }
        }else{
            $_SESSION['error_add_category'] = true;
        }
        
        echo "<script>window.location='" . base_url . "categoria/gestionar'</script>";
    }
    
    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $delete = $categoria->delete();
            if($delete){
                $_SESSION['delete_category'] = true;
            }else{
                 $_SESSION['error_delete_category'] = true;
            }
        }else{
            $_SESSION['error_delete_category'] = true;
        }
        
        echo "<script>window.location='" . base_url . "categoria/gestionar'</script>";
    }
    
    public function view(){
        if(isset($_GET['id'])){
            $categoria_id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($categoria_id);
            $categoria = $categoria->getOne()->fetch_object();
            
            $entrada = new Entrada();
            $entrada->setCategoria_id($categoria_id);
            $entradas = $entrada->getAllCategory();
        }
        
        require_once 'views/categoria/view.php';
    }
}

