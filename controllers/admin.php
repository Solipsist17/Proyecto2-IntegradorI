<?php 

class Admin extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->mensaje = ""; 
         
        //echo "<p>Error al cargar recurso</p>";
    }

    function render() {
        $this->view->render('admin/index');
    }

    /* function verAlumno($param = null) {
        $idAlumno = $param[0];
        $alumno = $this->model->getById($idAlumno); // llamamos a la función que retorna el id

        session_start();
        $_SESSION['id_verAlumno'] = $alumno->matricula; // guardamos en la variable de session 

        $this->view->alumno = $alumno; // guardamos en el objeto alumno 
        $this->view->mensaje = ""; // lo asignamos como vacío
        $this->view->render('consulta/detalle');
    } */
    
}

?>