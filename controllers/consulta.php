<?php 

class Consulta extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->alumnos = []; // variable para guardar los datos de alumnos
         
        //$this->view->mensaje = "";
        //echo "<p>Error al cargar recurso</p>";
    }

    function render() {
        $alumnos = $this->model->get(); // Traemos los datos con la función del modelo
        $this->view->alumnos = $alumnos;

        $this->view->render('consulta/index');
    }

    
}

?>