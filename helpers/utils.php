<?php

require_once 'models/Usuario.php';
require_once 'models/Categoria.php';
require_once 'models/Pedido.php';
require_once 'models/Entrada.php';

class Utils {

    public static function delete_session($name) {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
    }

    public static function isLoged() {
        if (!isset($_SESSION['identity'])) {
            header("Location:" . base_url);
        }
    }

    public static function showAllDataFromUsuario($id) {

        $usuario = new Usuario();
        $usuario->setId($id);
        $identity = $usuario->showAllDataFromUsuario();
        if ($identity && is_object($identity)) {
            $_SESSION['show_data_usuario'] = $identity;
        }
    }

    public static function showAllCategories() {

        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        if ($categorias) {
            $_SESSION['show_categories'] = $categorias;
        }
    }

    public static function showOneCategory() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $categorias = $categoria->getOne();
            if ($categorias) {
                $_SESSION['show_one_category'] = $categorias->fetch_object();
            }
        }
    }

    public static function isAdmin() {
        if (!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
        }
    }
    
    public static function getAllOrders(){
        $pedido = new Pedido();
        $pedidos = $pedido->getAllOrders();
        if($pedidos){
            $_SESSION['all_orders'] = $pedidos;
        }
        
    }
    
    public static function getCategoriaById($id){
        $categoria = new Categoria();
        $categoria->setId($id);
        $categorias = $categoria->getCategoriesById();
        if($categorias){
             $_SESSION['category_by_id'] = $categorias->fetch_object();
        }
       
    }
    
    public static function getUserById($id){
        $usuario = new Usuario();
        $usuario->setId($id);
        $usuarios = $usuario->showAllDataFromUsuario();
        if($usuarios){
             $_SESSION['user_by_id'] = $usuarios;
        }
       
    }
    
    public static function getOrderById($id){
        $pedido = new Pedido();
        $pedido->setId($id);
        $pedidos = $pedido->showOrdersById();
        if($pedidos){
            $_SESSION['order_by_id'] = $pedidos->fetch_object();
        }
    }
    
    public static function getEntradaById($id){
        $entrada = new Entrada();
        $entrada->setId($id);
        $entradas = $entrada->getOneById();
        if($entradas){
            $_SESSION['entrada_by_id'] = $entradas;
        }
    }

}
