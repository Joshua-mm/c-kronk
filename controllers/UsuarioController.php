<?php

require_once 'models/Usuario.php';

class UsuarioController {

    public function save() {
        if (isset($_POST)) {

            $nombre = isset($_POST['name']) ? $_POST['name'] : false;
            $apellidos = isset($_POST['lastname']) ? $_POST['lastname'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
//            $img = isset($_POST['img']) ? $_POST['img'] : false;
            $about = isset($_POST['about']) ? $_POST['about'] : false;

            if ($nombre && $apellidos && $email && $password) {

                if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
                    $nombre_validado = true;
                } else {
                    $_SESSION['error']['nombre'] = true;
                }
                if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
                    $apellidos_validados = true;
                } else {
                    $_SESSION['error']['apellidos'] = true;
                }

                if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_validado = true;
                } else {
                    $_SESSION['error']['email'] = true;
                }

                if (!empty($password)) {
                    $password_validada = true;
                } else {
                    $_SESSION['error']['password'] = true;
                }


                if ($nombre_validado && $apellidos_validados && $email_validado && $password_validada) {

                    $usuario = new Usuario();
                    $usuario->setNombre($nombre);
                    $usuario->setApellidos($apellidos);
                    $usuario->setEmail($email);
                    $usuario->setPassword($password);
                    $usuario->setAbout($about);
                    /// Subida del archivo

                    if (isset($_FILES)) {
                        $file = $_FILES['img'];
                        $filename = $file['name'];
                        $tipo = $file['type'];
                        if ($tipo == 'image/jpg' || $tipo == 'image/jpeg' || $tipo == 'image/png' || $tipo == 'image/gift') {
                            if (!is_dir('uploads/images')) {
                                mkdir('uploads/images', 0777, true);
                            }

                            move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                            $usuario->setImagen($filename);
                        }
                    }
                    $save = $usuario->save();
                    if ($save) {
                        $_SESSION['register'] = 'complete';
                    } else {
                        $_SESSION['register'] = 'failed';
                    }
                } else {
                    $_SESSION['register'] = 'failed';
                }
            } else {
                $_SESSION['register'] = 'failed';
            }
        } else {
            $_SESSION['register'] = 'failed';
        }

//        require_once 'views/usuario/sign-up.php';
        echo "<script>window.location='" . base_url . "usuario/sign_up'</script>";
    }

    public function sign_up() {
        // cargar vista
        require_once 'views/usuario/sign-up.php';
    }

    public function login() {
        if (isset($_POST)) {
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($email && $password) {
                $usuario = new Usuario();
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $identity = $usuario->login();
                if ($identity && is_object($identity)) {
                    $_SESSION['identity'] = $identity;
                    if ($identity->rol == 'admin') {
                        $_SESSION['admin'] = true;
                    }
                } else {
                    $_SESSION['error_login'] = true;
                }
            } else {
                $_SESSION['error_login'] = true;
            }
        } else {
            $_SESSION['error_login'] = true;
        }
//        require_once 'views/entrada/index.php';
        echo "<script>window.location='" . base_url . "'</script>";
    }

    public function logout() {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }

        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

//        require_once 'views/entrada/index.php';
        echo "<script>window.location='" . base_url . "'</script>";
    }

    public function profile() {
        Utils::isLoged();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $usuario = new Usuario();
            $usuario->setId($id);
            $show = $usuario->myProfile();
            if($show && is_object($show)){
                $_SESSION['identity_2'] = $show;
            }
            require_once 'views/usuario/profile.php';
        }
    }
    
    public function edit() {
        Utils::isLoged();
        $identity = $_SESSION['identity'];
       
        if (isset($_POST)) {

            $nombre = isset($_POST['name']) ? $_POST['name'] : false;
            $apellidos = isset($_POST['lastname']) ? $_POST['lastname'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
//            $img = isset($_POST['img']) ? $_POST['img'] : false;
            $about = isset($_POST['about']) ? $_POST['about'] : false;
            $id = isset($_GET['id']) ? $_GET['id'] : false;

            if ($nombre && $apellidos && $email && $id) {

                if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
                    $nombre_validado = true;
                } else {
                    $_SESSION['error']['nombre'] = true;
                }
                if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
                    $apellidos_validados = true;
                } else {
                    $_SESSION['error']['apellidos'] = true;
                }

                if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_validado = true;
                } else {
                    $_SESSION['error']['email'] = true;
                }
                
                if ($nombre_validado && $apellidos_validados && $email_validado) {

                    $usuario = new Usuario();
                    $usuario->setNombre($nombre);
                    $usuario->setApellidos($apellidos);
                    $usuario->setEmail($email);
                    $usuario->setAbout($about);
                    $usuario->setId($id);
                    /// Subida del archivo

                    if (isset($_FILES)) {
                        $file = $_FILES['img'];
                        $filename = $file['name'];
                        $tipo = $file['type'];
                        if ($tipo == 'image/jpg' || $tipo == 'image/jpeg' || $tipo == 'image/png' || $tipo == 'image/gift') {
                            if (!is_dir('uploads/images')) {
                                mkdir('uploads/images', 0777, true);
                            }

                            move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                            $usuario->setImagen($filename);
                        }
                    }
                    $edit = $usuario->edit();
                    if ($edit) {
                        $_SESSION['edit'] = 'complete';
                    } else {
                        $_SESSION['edit'] = 'failed';
                    }
                } else {
                    $_SESSION['edit'] = 'failed';
                }
            } else {
                $_SESSION['edit'] = 'failed';
            }
        } else {
            $_SESSION['edit'] = 'failed';
        }

        echo "<script>window.location='" . base_url . "usuario/edit_profile&id=".$identity->id."'</script>";
    }
    
    public function edit_profile(){
        Utils::isLoged();
        if(isset($_GET['id'])){
            require_once 'views/usuario/edit_profile.php';
        } 
        
    }
    
//    public function showAllDataFromUsuario(){
//        if(isset($_GET['id'])){
//            $id = $_GET['id'];
//            $usuario = new Usuario();
//            $usuario->setId($id);
//            $identity = $usuario->showAllDataFromUsuario();
//            if($identity && is_object($identity)){
//                $_SESSION['show_data_usuario'] = $identity;
//            }
//        }
//    }
    
    public function manage(){
        Utils::isAdmin();
        $usuario = new Usuario();
        $usuarios = $usuario->showAllUsers();
        if($usuarios){
            $_SESSION['all_users'] = $usuarios;
        }
        require_once 'views/usuario/manage.php';
    }
    
    public function remove_one(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $usuario = new Usuario();
            $usuario->setId($id);
            $remove = $usuario->removeOne();
            if($remove){
                $_SESSION['remove_usuario'] = true;
            }else{
                $_SESSION['error_remove_usuario'] = true;
            }
        }else{
            $_SESSION['error_remove_usuario'] = true;
        }
        
        echo "<script>window.location='" . base_url . "usuario/manage'</script>";
    }
}


















