<?php 

class Usuario extends Controller {

    function __construct() {
        parent::__construct();
         
        $this->view->mensaje = "";
        //echo "<p>Error al cargar recurso</p>";
    }

    function render() {
        $this->view->render('registro/index');
    }

    function registrarUsuario() {
        //session_start(); ////////
        $username = $_POST['username'];
        $password = $_POST['password'];
        $correo = $_POST['correo'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $idRol =  2 /* $_POST['idRol'] */;

        $mensaje = "";

        if($this->model->registrar(["username" => $username, "password" => $password, "correo" => $correo, "nombre" => $nombre, "apellido" => $apellido, "idRol" => $idRol])) {
            $mensaje = "Nuevo usuario creado";
        } else {
            $mensaje = "Error o ya existe";
        }

        $this->view->mensaje = $mensaje; // Asignamos el mensaje al objeto de la vista

        $this->render();
    }

    /* function actualizarAlumno() {
        echo "Alumno actualizado";
        $this->model->update();
    } */
}

?>