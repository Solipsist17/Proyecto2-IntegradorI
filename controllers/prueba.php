<?php 

class Prueba extends Controller {

    function __construct() {
        parent::__construct();
         
        $this->view->render('prueba/index');
        //echo "<p>Error al cargar recurso</p>";
    }

    function registrarAlumno() {
        //session_start(); ////////
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];

        if($this->model->insert(["matricula" => $matricula, "nombre" => $nombre, "apellido" => $apellido])) {
            //echo "Nuevo alumno creado";

            // ARREGLAR ESTO (MOSTRAR MENSAJE EN LA MISMA PÁGINA)
            $_SESSION["message"] = "Alumno creado satisfactoriamente";
            header("Location: ".constant('URL')."prueba/prueba/registrarAlumno"); // Redireccionamos para mostrar el mensaje
        }
    }

    function actualizarAlumno() {
        echo "Alumno actualizado";
        $this->model->update();
    }
}

?>