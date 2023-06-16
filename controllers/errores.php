<?php 

class Errores extends Controller {

    function __construct() { 
        parent::__construct();
        $this->view->mensaje = "Error en la solicitud o no existe la página";
        $this->view->prueba = "mensaje de prueba"; 
        $this->view->render('errores/index'); 
        //echo "<p>Error al cargar recurso</p>";
    }

    /* function render() {
        $this->view->render('errores/index');
    } */

}

?>