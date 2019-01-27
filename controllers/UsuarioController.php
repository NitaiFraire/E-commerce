<?php

require_once 'models/usuario.php';

class UsuarioController{

    public function index(){

         echo "Funcionando usuarios";
    }

    public function registro(){

        require_once 'views/usuario/registro.php';
    }

    public function save(){

        if(isset($_POST)){
        
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if($nombre && $apellido && $email && $password){

                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellido);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
    
                $save = $usuario->saveUser();
    
                if($save){
    
                    $_SESSION['register'] = "complete";
    
                }else{
    
                    $_SESSION['register'] = "failed";
                }

            }else{

                $_SESSION['register'] = "failed";
            }

        }else{

            $_SESSION['register'] = 'failed';
        }
        header('Location:' . baseUrl . 'Usuario/registro');   
    }

    public function login(){

        if(isset($_POST)){

            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identity = $usuario->login();

            if($identity && is_object($identity)){

                $_SESSION['identified'] = $identity;


                if($identity->rol == 'admin'){

                    $_SESSION['admin'] = true;
                }

            }else{

                $_SESSION['error_login'] = 'Esta no es tu identificacion :/';
            }
        }
        header('Location:' . baseUrl);
    }

    public function logout(){

        if(isset($_SESSION['identified'])){

            unset($_SESSION['identified']);

        }

        if(isset($_SESSION['admin'])){

            unset($_SESSION['admin']);
            
        }

        header('Location:' . baseUrl);
    }
}

?>