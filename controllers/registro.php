<?php 
 
class Registro extends Controller{
     
    function __construct() {
        parent::__construct(); // llamamos al constructor de Controller

        $this->view->mensaje = "";
        //$this->view->render('main/index'); 
        //echo "<p>Nuevo controlador Main</p>";
    } 

    function render() {
        $this->view->render('registro/index');
    }

    function saludo() {
        echo "<p>Ejecutaste el método saludo</p>";
    }

    /* function registrarUsuario() {
        //session_start(); ////////
        $username = $_POST['username'];
        $password = $_POST['password'];
        $correo = $_POST['correo'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];

        $mensaje = "";

        if($this->model->registrar(["username" => $username, "password" => $password, "correo" => $correo, "nombre" => $nombre, "apellido" => $apellido])) {
            $mensaje = "Nuevo usuario creado";
        } else {
            $mensaje = "Error o ya existe";
        }

        $this->view->mensaje = $mensaje; // Asignamos el mensaje al objeto de la vista

        $this->render();
    } */

}

?>