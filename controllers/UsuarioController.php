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
            $apellido = isset($_POST['apellidos']) ? $_POST['nombre'] : false;
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
}

?>