<?php 

// Clase base para todos los controladores 
class Controller { 

    function __construct() {
        //echo "<p>Controlador base</p>";
        $this->view = new View(); // Creamos un objeto de la clase View
    }

}

?>