<?php

require_once 'models/Favorito.php';

class FavoritoController {

    public function index() {
        Utils::isLoged();
        if (isset($_GET['id'])) {
            $usuario_id = $_GET['id'];
            $favorito = new Favorito();
            $favorito->setUsuario_id($usuario_id);
            $favoritos = $favorito->getFavoritoById();
            if ($favoritos) {
                $_SESSION['show_fav'] = $favoritos;
            }
        }

        require_once 'views/favorito/index.php';
    }

    public function add() {
        Utils::isLoged();
        if (isset($_GET)) {
            /* Recoger datos */
            $entrada_id = isset($_GET['entrada_id']) ? $_GET['entrada_id'] : false;
            $usuario_id = isset($_GET['usuario_id']) ? $_GET['usuario_id'] : false;
            $categoria_id = isset($_GET['categoria_id']) ? $_GET['categoria_id'] : false;

            if ($entrada_id && $usuario_id && $categoria_id) {
                // Instancia
                $favorito = new Favorito();
                // setters
                $favorito->setEntrada_id($entrada_id);
                $favorito->setUsuario_id($usuario_id);
                // Utils
                Utils::getCategoriaById($categoria_id);
                $cat = $_SESSION['category_by_id'];
                $favorito->setCategoria_id($cat->id);
                Utils::getEntradaById($entrada_id);
                $ent = $_SESSION['entrada_by_id'];
                $favorito->setTitulo($ent->titulo);
                $favorito->setAutor($ent->artista);


                // Consulta

                $save = $favorito->save();
                if ($save) {
                    $_SESSION['add_favorite'] = true;
                    $_SESSION['already'] = true;
                } else {
                    $_SESSION['error_add_favorite'] = true;
                }
            } else {
                $_SESSION['error_add_favorite'] = true;
            }
        } else {
            $_SESSION['error_add_favorite'] = true;
        }

        echo "<script>window.location='" . base_url . "favorito/index&id=" . $usuario_id . "'</script>";
    }

    public function remove_one() {
        
        if (isset($_GET['id']) && isset($_GET['user_id'])) {
            $id = $_GET['id'];
            $user_id = $_GET['user_id'];
            $favorito = new Favorito();
            $favorito->setId($id);
            $favoritos = $favorito->remove_one();
            if ($favoritos) {
                $_SESSION['remove_favoritos_id'] = true;
            } else {
                $_SESSION['error_remove_favoritos_id'] = true;
            }
        } else {
            $_SESSION['error_remove_favoritos_id'] = true;
        }
        
        echo "<script>window.location='" . base_url . "favorito/index&id=" . $user_id . "'</script>";
    }

}
