<?php

require_once 'models/pedido.php';

class PedidoController{

    public function hacer(){

         require_once 'views/pedido/hacer.php';
    }

    public function add(){

        if(isset($_SESSION['identified'])){

            // Guardar pedido
            $usuario_id = $_SESSION['identified']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];
            
            if($provincia && $localidad & $direccion){
                
                $pedido = new Pedido();

                $pedido->setUsuario_id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                // Guardar linea de pedido
                $saveLinea = $pedido->saveLinea();

                if($save && $saveLinea){

                    $_SESSION['pedido'] = 'complete';

                }else{

                    $_SESSION['pedido'] = 'failded';
                }

            }else{

                $_SESSION['failed'] = 'failed';
            }

            header('Location:' . baseUrl . 'Pedido/confirmado');

        }else{

            // Redirigir al index
            header('Location: ' . baseUrl);

        }
    }

    public function confirmado(){

        if(isset($_SESSION['identified'])){

            $identified = $_SESSION['identified'];

            $pedido = new Pedido();
            $pedido->setUsuario_id($identified->id);
            $pedido = $pedido->getOneByUser();

            $pedidoProducto = new Pedido();
            $productos = $pedidoProducto->getProductsByPedido($pedido->id);
        }

        require_once 'views/pedido/confirmado.php';
    }

    public function misPedidos(){

        Utils::isIdentified();

        $usuario_id = $_SESSION['identified']->id;

        $pedido = new Pedido();
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getAllByUser();

        require_once 'views/pedido/misPedidos.php';
    }

    public function detalle(){

        Utils::isIdentified();

        if(isset($_GET['id'])){

            $id = $_GET['id'];

            // Get datos de pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            // Get productos
            $pedidoProducto = new Pedido();
            $productos = $pedidoProducto->getProductsByPedido($id);


            require_once 'views/pedido/detalle.php';

        }else{

            header('Location: ' . baseUrl . 'Pedido/misPedidos');
        }
    }

    public function gestion(){

        Utils::isAdmin();

        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/misPedidos.php';
    }

    public function estado(){

        Utils::isAdmin();

        if(isset($_POST['pedido_id']) && isset($_POST['estado'])){

            $id = $_POST['pedido_id'];
            $status = $_POST['estado'];

            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($status);
            $pedido->updateOne();


            header('Location: ' . baseUrl . 'Pedido/detalle&id=' . $id);

        }else{

            header('Location: ' . baseUrl);
        }
    }
}

?>