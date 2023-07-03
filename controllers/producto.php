<?php 

    //include_once 'models/categoriamodel.php';
    //include_once 'models/ofertamodel.php';
    //include_once 'models/productomodel.php';

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
        $this->view->mensaje = ""; 
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

    function gestionarCarrito() { // Agrega o elimina elementos del carrito según la acción
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $jsonData = file_get_contents('php://input'); // Obtener el contenido del cuerpo de la solicitud
            $data = json_decode($jsonData, true); // Decodificar la cadena JSON en un arreglo asociativo
            
            // AGREGAR MENSAJE DE VALIDACION
            if (!isset($_SESSION['idUsuario'])) {
                $_SESSION['mensaje'] = "Necesita iniciar sesión para realizar esta acción";
                $data = [
                    'productosCarrito' => [],
                    'mensaje' => 'error'
                ];
                echo json_encode($data);
                return;
            } 

            $dato = $this->model->gestionarCarrito($data);
            
            echo $dato;
            //exit(); 
        }
    }

    /* function agregarCarrito() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $jsonData = file_get_contents('php://input'); // Obtener el contenido del cuerpo de la solicitud
            $data = json_decode($jsonData, true); // Decodificar la cadena JSON en un arreglo asociativo
            
            // AGREGAR MENSAJE DE VALIDACION
            if (!isset($_SESSION['idUsuario'])) {
                $_SESSION['mensaje'] = "Necesita iniciar sesión para agregar productos al carrito";
                $data = [
                    'productosCarrito' => [],
                    'mensaje' => 'error'
                ];
                echo json_encode($data);
                return;
            } 

            $productosCarrito = isset($_SESSION['productosCarrito']) ? $_SESSION['productosCarrito'] : [];
            //$productosCarrito = $_SESSION['productosCarrito'];

            $id = $data['id'];
            $accion = $data['accion'];

            $producto = $this->model->consultarPorId($id);

            if ($accion == "agregar") {

                if (!in_array($producto, $productosCarrito)) { // verificamos si no existe en el array carrito
                    array_push($productosCarrito, $producto);
                    $_SESSION['productosCarrito'] = $productosCarrito;
                }
            
            } elseif ($accion == "quitar") {

                if (in_array($producto, $productosCarrito)) { // Verificamos si existe en el array carrito
                    $indice = array_search($producto, $productosCarrito);
                    unset($productosCarrito[$indice]);
                    $productosCarrito = array_values($productosCarrito); // reorganizamos los índices
                    $_SESSION['productosCarrito'] = $productosCarrito;
                }
            }
             
            $data = [
                'productosCarrito' => $productosCarrito,
                'producto' => $producto,
                'dato' => 'dato'
            ];
            echo json_encode($data);
            exit(); 
        }
    } */



    /* function listarPorCategoria($categoria) {

    } */

    /* function probando() {
        $this->view->mensaje = "probando";
        $this->view->render('registro/index');
    } */

}

?>