<?php

require_once 'models/Pedido.php';

class PedidoController {

    public function orders() {
        require_once 'views/pedido/orders.php';
    }

    public function save() {
        $identity = $_SESSION['identity'];
        if (isset($_POST) && isset($_GET)) {
            $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : false;
            $autor = isset($_POST['autor']) ? $_POST['autor'] : false;
            $categoria_id = isset($_POST['category']) ? $_POST['category'] : false;
            $usuario_id = isset($_GET['id']) ? $_GET['id'] : false;
            $estado = isset($_POST['estado']) ? $_POST['estado'] : false;
            if ($titulo && $autor && $categoria_id && $usuario_id && $estado) {

                if (!empty($titulo)) {
                    $nombre_validado = true;
                }

                if (!empty($autor)) {
                    $autor_validado = true;
                }

                if (!empty($categoria_id) && is_numeric($categoria_id)) {
                    $categoria_id_validada = true;
                }

                if (!empty($usuario_id) && is_numeric($usuario_id)) {
                    $usuario_id_validado = true;
                }

                if (!empty($estado) && !is_numeric($estado) && !preg_match("/[0-9]/", $estado) && $estado == "sent") {
                    $estado_validado = true;
                }
                if ($nombre_validado && $autor_validado && $categoria_id_validada && $usuario_id_validado && $estado_validado) {

                    $pedido = new Pedido();
                    $pedido->setUsuario_id($usuario_id);
                    $pedido->setCategoria_id($categoria_id);
                    $pedido->setTitulo($titulo);
                    $pedido->setAutor($autor);
                    $pedido->setEstado($estado);
                    $pedidos = $pedido->save();
                    if ($pedidos) {
                        $_SESSION['add_pedido'] = true;
                    } else {
                        $_SESSION['error_add_pedido'] = true;
                    }
                } else {
                    $_SESSION['error_add_pedido'] = true;
                }
            } else {
                $_SESSION['error_add_pedido'] = true;
            }
        } else {
            $_SESSION['error_add_pedido'] = true;
        }

        echo "<script>window.location='" . base_url . "pedido/songs&id=" . $identity->id . "'</script>";
    }

    public function songs() {
        Utils::isLoged();
        if (isset($_GET['id'])) {
            $usuario_id = $_GET['id'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($usuario_id);
            $pedidos = $pedido->getOrdersByUser();
            if ($pedidos && is_object($pedidos)) {
                $_SESSION['pedidos'] = $pedidos;
            }
        }
        require_once 'views/pedido/songs.php';
    }

    public function manage() {
        require_once 'views/pedido/manage.php';
    }

    public function removeOne() {
        Utils::isLoged();
        $identity = $_SESSION['identity'];
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $pedido = new Pedido();
            $pedido->setId($id);
            $remove = $pedido->removeOne();
            if ($remove) {
                $_SESSION['remove_order'] = true;
            } else {
                $_SESSION['error_remove_order'] = true;
            }
        } else {
            $_SESSION['error_remove_order'] = true;
        }

        echo "<script>window.location='" . base_url . "pedido/songs&id=" . $identity->id . "'</script>";
    }

    public function removeOneAdmin() {
        Utils::isAdmin();
        $identity = $_SESSION['identity'];
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $pedido = new Pedido();
            $pedido->setId($id);
            $remove = $pedido->removeOne();
            if ($remove) {
                $_SESSION['remove_order'] = true;
            } else {
                $_SESSION['error_remove_order'] = true;
            }
        } else {
            $_SESSION['error_remove_order'] = true;
        }

        echo "<script>window.location='" . base_url . "pedido/manage'</script>";
    }

    public function remove_all() {
        Utils::isLoged();
        $pedido = new Pedido();
        $remove = $pedido->removeAll();
        if ($remove) {
            $_SESSION['remove_all'] = true;
        } else {
            $_SESSION['error_remove_all'] = true;
        }

        echo "<script>window.location='" . base_url . "pedido/manage'</script>";
    }

    public function remove_all_by_user() {
        Utils::isLoged();
        $identity = $_SESSION['identity'];

        if (isset($_GET['id'])) {
            $usuario_id = $_GET['id'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($usuario_id);
            $remove = $pedido->removeAllByUser();
            if ($remove) {
                $_SESSION['remove_all'] = true;
            } else {
                $_SESSION['error_remove_all'] = true;
            }
        } else {
            $_SESSION['error_remove_all'] = true;
        }

        echo "<script>window.location='" . base_url . "pedido/songs&id=" . $identity->id . "'</script>";
    }

    public function details() {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            Utils::getOrderById($id);
            require_once 'views/pedido/details.php';
        }
    }

    public function detalle() {
        if (isset($_POST)) {
            $id = isset($_POST['id']) ? $_POST['id'] : false;
            $estado = isset($_POST['state']) ? $_POST['state'] : false;
//            var_dump($id);            var_dump($estado); die();
//            if ($estado == 'sent') {
//                $estado == "Sent";
//            }
//
//            if ($estado == 'ready') {
//                $estado == "Ready";
//            }
//
//            if ($estado == 'rejected') {
//                $estado == "Rejected";
//            }
            if ($id && $estado) {
//                var_dump($id);            var_dump($estado); die();
                $pedido = new Pedido();
                $pedido->setId($id);
                $pedido->setEstado($estado);
                $update = $pedido->update();
            }
        }

        echo "<script>window.location='" . base_url . "pedido/manage'</script>";
    }

}
