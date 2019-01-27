<?php

session_start();

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'config/functions.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';


// Validacion controller
if(isset($_GET['controller'])){

    $nombreControlador = $_GET['controller'] . 'Controller';


}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){

    $nombreControlador = controllerDefault;

}else{

    Utils::showError();
}

// validacion action
if(class_exists($nombreControlador)){

    $controlador = new $nombreControlador();

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){

        $action = $_GET['action'];
        $controlador->$action();
    
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){

        $actionDefault = actionDefault;
        $controlador->$actionDefault();

    }else{
        
       Utils::showError();
    }

}else{

    Utils::showError();
}

require_once 'views/layout/footer.php';


?>