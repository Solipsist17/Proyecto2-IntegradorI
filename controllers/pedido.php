<?php 
 
class Pedido extends Controller{
     
    function __construct() {
        parent::__construct(); // llamamos al constructor de Controller

        $this->view->mensaje = "";
        //$this->view->render('main/index'); 
        //echo "<p>Nuevo controlador Main</p>";
    }

    function render() {
        $this->view->render('pedidos/index');
    }

    function saludo() {
        echo "<p>Ejecutaste el método saludo</p>";
    }

}

?>