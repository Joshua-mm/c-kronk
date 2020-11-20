<?php

require_once 'models/Entrada.php';

class EntradaController{
    
    public function index(){
        $entrada = new Entrada();
        $entradas = $entrada->getAllEntradas();
        if($entradas){
            $_SESSION['entradas_index'] = $entradas;
        }
        require_once 'views/entrada/index.php';
    }
    public function manage(){
        Utils::isAdmin();
        $entrada = new Entrada();
        $entradas = $entrada->getAllEntradas();
        if($entradas){
            $_SESSION['all_entradas'] = $entradas;
        }
        require_once 'views/entrada/manage.php';
    }
    
    public function add(){
        Utils::isAdmin();
        require_once 'views/entrada/add.php';
    }
    
    public function save(){
        Utils::isAdmin();
        if(isset($_POST) && isset($_GET)){
            $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : false;
            $artista = isset($_POST['artista']) ? $_POST['artista'] : false;
            $letra = isset($_POST['letra']) ? $_POST['letra'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $usuario_id = isset($_GET['id']) ? $_GET['id'] : false;
            $editar = isset($_GET['edit']) ? $_GET['edit'] : false;
            
            if($titulo && $artista && $letra && $categoria){
                if(!empty($titulo)){
                    $titulo_validado = true;
                }
                
                if(!empty($artista)){
                    $artista_validado = true;
                }
                
                if(!empty($letra)){
                    $letra_validada = true;
                }
                
                if(!empty($categoria) && is_numeric($categoria)){
                    $categoria_validada = true;
                }
                
                if(!empty($usuario_id) && is_numeric($usuario_id)){
                    $usuario_id_validado = true;
                }

                if($titulo_validado && $artista_validado && $letra_validada && $categoria_validada && $usuario_id_validado){
                    $entrada = new Entrada();
                    $entrada->setTitulo($titulo);
                    $entrada->setArtista($artista);
                    $entrada->setDescripcion($letra);
                    $entrada->setCategoria_id($categoria);
                    $entrada->setUsuario_id($usuario_id);
                    $save = $entrada->save();
                    if($save){
                        $_SESSION['add_entrada'] = true;
                    }else{
                        $_SESSION['error_add_entrada'] = true;
                    }
                }else{
                    $_SESSION['error_add_entrada'] = true;
                }//
            }else{
                $_SESSION['error_add_entrada'] = true;
            }
        }else{
            $_SESSION['error_add_entrada'] = true;
        }
        
        if($editar == true){
            echo "<script>window.location='" . base_url . "pedido/manage'</script>";
        }else{
            echo "<script>window.location='" . base_url . "entrada/manage'</script>";
        }
        
        
    }
    
    public function save_by_id(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            Utils::getOrderById($id);
            require_once 'views/entrada/add_by_id.php';
        }
      
    }
    
    public function view_one(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $entrada = new Entrada();
            $entrada->setId($id);
            $entradas = $entrada->getOneById();
            if($entradas){
                $_SESSION['one_entrada'] = $entradas;
            }
        }
        
        require_once 'views/entrada/view_one.php';
    }
    
    public function remove_one(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $entrada = new Entrada();
            $entrada->setId($id);
            $entradas = $entrada->remove_one();
            if($entradas){
                $_SESSION['remove_entrada_id'] = true;
            }else{
                $_SESSION['error_remove_entrada_id'] = true;
            }
        }else{
            $_SESSION['error_remove_entrada_id'] = true;
        }
        
        echo "<script>window.location='" . base_url . "entrada/manage'</script>";
    }
    
    public function result(){
        if(isset($_POST['search'])){
            $_SESSION['search_search'] = $_POST['search'];
            $search = $_POST['search'];
            $entrada = new Entrada();
            $entradas = $entrada->search($search);
//            if($entradas){
//                $_SESSION['search'] = $entradas;
//            }

            require_once 'views/entrada/search.php';
        }
        
        
    }
}
