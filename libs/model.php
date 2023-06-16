<?php 

// Clase base para todos los modelos
class Model { 

    function __construct() {
        $this->db = new Database();
    }
}

?>