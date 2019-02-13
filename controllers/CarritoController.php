<?php

require_once 'models/producto.php';

class CarritoController{

    public function index(){

        $carrito = $_SESSION['carrito'];
        
        require_once 'views/carrito/index.php';
    }


    public function add(){

        if(isset($_GET['id'])){

            $producto_id = $_GET['id'];

        }else{

            header('Location:' . baseUrl);
        }


       if(isset($_SESSION['carrito'])){

            $counter = 0;

            foreach($_SESSION['carrito'] as $i => $elemento){

                if($elemento['id_producto'] == $producto_id){

                    $_SESSION['carrito'][$i]['unidades']++;
                    $counter++;
                }
            }
       }

       if(!isset($counter) || $counter == 0){

            $producto = new Producto();

            $producto->setId($producto_id);
            $producto = $producto->getOne();

            if(is_object($producto)){

                $_SESSION['carrito'][] = array(

                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
       }

       
       header('Location:' . baseUrl . 'Carrito/index');
    }

    public function remove(){

    }

    public function deleteAll(){


        unset($_SESSION['carrito']);
        header('Location:' . baseUrl . 'Carrito/index');
    }
}

?>