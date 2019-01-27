<?php

class Categoria{

    private $id;
    private $nombre;
    private $db;

    public function __construct(){
        
        DataBase::connect();
    }

    
}

?>