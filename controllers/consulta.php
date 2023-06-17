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

    function verAlumno($param = null) {
        $idAlumno = $param[0];
        $alumno = $this->model->getById($idAlumno); // llamamos a la función que retorna el id

        session_start();
        $_SESSION['id_verAlumno'] = $alumno->matricula; // guardamos en la variable de session 

        $this->view->alumno = $alumno; // guardamos en el objeto alumno 
        $this->view->mensaje = ""; // lo asignamos como vacío
        $this->view->render('consulta/detalle');
    }

    function actualizarAlumno() {
        session_start();
        $matricula = $_SESSION['id_verAlumno']; // traemos la variable de session

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];

        unset($_SESSION['id_verAlumno']); // eliminamos la variable de session

        if ($this->model->update(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido])) {
            // actualizar alumno exito
            $alumno = new Alumno();
            $alumno->matricula = $matricula;
            $alumno->nombre = $nombre;
            $alumno->apellido = $apellido;

            $this->view->alumno = $alumno; // guardamos los datos actualizados en el objeto alumno
            $this->view->mensaje = "Alumno actualizado correctamente";
        } else {
            // mensaje de error
            $this->view->mensaje = "No se pudo actualizar el alumno";
        }

        $this->view->render('consulta/detalle'); // Redirigimos a la misma página con los campos atualizados
    }

    function eliminarAlumno($param = null) {
        $matricula = $param[0];

        if ($this->model->delete($matricula)) {
            // actualizar alumno exito
            $this->view->mensaje = "Alumno eliminado correctamente";
            echo "true";
        } else {
            // mensaje de error
            $this->view->mensaje = "No se pudo eliminar el alumno";
            echo "false";
        }

        $this->render(); // Redirigimos al index
    }

    
}

?>