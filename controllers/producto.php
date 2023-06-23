<?php 

class Producto extends Controller {

    function __construct() {
        parent::__construct(); 
        $this->view->ropaMujeres = [];
        $this->view->accesoriosMujeres = [];
        $this->view->ropaHombres = [];
        $this->view->accesoriosHombres = [];
        $this->view->ropaNiños = [];
        $this->view->accesoriosNiños = []; 
        //$this->view->producto = new ProductoModel();
        //$this->view->render('producto/index');
        //echo "<p>Error al cargar recurso</p>";
        $this->view->mensaje = "Mensaje desde el controlador de producto"; 
    }

    function render() {
        // Traemos los datos de las categorías
        $this->view->ropaMujeres = $this->model->listarPorCategoria('ropaMujeres');
        $this->view->accesoriosMujeres = $this->model->listarPorCategoria('accesoriosMujeres');
        $this->view->ropaHombres = $this->model->listarPorCategoria('ropaHombres');
        $this->view->accesoriosHombres = $this->model->listarPorCategoria('accesoriosHombres');
        $this->view->ropaNiños = $this->model->listarPorCategoria('ropaNiños');
        $this->view->accesoriosNiños = $this->model->listarPorCategoria('accesoriosNiños');

        $this->view->render('producto/index');
    }

    function agregarCarrito() {

    }

    /* function listarPorCategoria($categoria) {

    } */

    /* function probando() {
        $this->view->mensaje = "probando";
        $this->view->render('registro/index');
    } */

}

?>