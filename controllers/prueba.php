<?php 

class Prueba extends Controller {

    function __construct() {
        parent::__construct();
         
        $this->view->mensaje = "";
        //echo "<p>Error al cargar recurso</p>";
    }

    function render() {
        $this->view->render('prueba/index');
    }

    function registrarAlumno() {
        //session_start(); ////////
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];

        $mensaje = "";

        if($this->model->insert(["matricula" => $matricula, "nombre" => $nombre, "apellido" => $apellido])) {
            $mensaje = "Nuevo alumno creado";
        } else {
            $mensaje = "La matrícula ya existe";
        }

        $this->view->mensaje = $mensaje; // Asignamos el mensaje al objeto de la vista

        $this->render();
    }

    function actualizarAlumno() {
        echo "Alumno actualizado";
        $this->model->update();
    }
}

?>