<?php 

class Prueba extends Controller {

    function __construct() {
        parent::__construct();
         
        $this->view->render('prueba/index');
        //echo "<p>Error al cargar recurso</p>";
    }

    function registrarAlumno() {
        echo "Alumno creado";
        $this->model->insert();  
    }

    function actualizarAlumno() {
        echo "Alumno actualizado";
        $this->model->update();
    }
}

?>