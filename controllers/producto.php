<?php 

class Producto extends Controller {

    function __construct() {
        parent::__construct(); 
         
        //$this->view->render('producto/index');
        //echo "<p>Error al cargar recurso</p>";
    }

    function render() {
        $this->view->render('producto/index');
    }

}

?>