<?php 
 
class Login extends Controller{
     
    function __construct() {
        parent::__construct(); // llamamos al constructor de Controller

        $this->view->mensaje = "";
        //$this->view->render('main/index'); 
        //echo "<p>Nuevo controlador Main</p>";
    }

    function render() {
        // Si ya ha iniciado sesión, redirigimos a cuenta
        if (isset($_SESSION['idUsuario'])) { 
            header('Location: cuenta');
        } else {
            $this->view->render('login/index');
        }
    }

    function saludo() {
        echo "<p>Ejecutaste el método saludo</p>";
    }

}

?>