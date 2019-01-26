<?php

require_once 'autoload.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';


if(isset($_GET['controller'])){

    $nombreControlador = $_GET['controller'] . 'Controller';

}else{

    echo "Controlador erroneo";
}

if(class_exists($nombreControlador)){

    $controlador = new $nombreControlador();

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){

        $action = $_GET['action'];
        $controlador->$action();
    
    }else{

        echo "Metodo erroneo";
    }

}else{

    echo "La pagina no existe";
}

require_once 'views/layout/footer.php';


?>