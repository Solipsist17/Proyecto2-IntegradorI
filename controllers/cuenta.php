<?php 
include_once 'models/usuariomodel.php';

class Cuenta extends Controller{
     
    function __construct() {
        parent::__construct(); // llamamos al constructor de Controller

        $this->view->mensaje = "";
        $this->view->usuario = new UsuarioModel();
        //$this->view->render('main/index'); 
        //echo "<p>Nuevo controlador Main</p>";
    }

    function render() {
        if (isset($_SESSION['idUsuario'])) { 
            $usuario = new UsuarioModel();
            $idUsuario = $_SESSION['idUsuario'];

            $this->view->usuario = $usuario->consultarPorId($idUsuario);

            $this->view->render('cuenta/index');

        } else {
            header('Location: login');
        }
    }

    /* function saludo() {
        echo "<p>Ejecutaste el método saludo</p>";
    } */

}

?>