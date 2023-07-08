<?php 

include_once 'models/productomodel.php';
include_once 'models/direccionmodel.php';
include_once 'models/pedidomodel.php';
include_once 'models/ventamodel.php';

class CheckoutModel extends Model {

    public $direccion; // idDireccion
    public $pedido; // idPedido
    public $venta; // idVenta

    public function __construct() {
        parent::__construct();
    }

    public function verificarDireccion($datos) {
        /* session_write_close();
        session_start();
        $data = $_SESSION['datosCompra']; */

        $direccion = new DireccionModel();
        
        //$direccion->registrar();
        if($direccion->registrar(["departamento" => $datos['departamento'], "provincia" => $datos['provincia'], "distrito" => $datos['distrito'], "calle" => $datos['calle']])) {
            //$mensaje = "Nuevo usuario creado";
            
            //$_SESSION['mensajeUsuario'] = "Registro exitoso, ingrese con su cuenta";
            //$this->view->mensaje = "Registro exitoso, ingrese con su cuenta";
            //$this->render();
            //header('Location: ' . constant('URL') . 'login');
            return true;
        } else {
            //$mensaje = "Error en el registro";
            //$this->view->render('registro/index');
            return false;
        }

        //return $data;
    }

    public function guardarDireccion($datos) {
        $direccion = new DireccionModel();
        $direccion->departamento = $datos['departamento'];
        $direccion->provincia = $datos['provincia'];
        $direccion->distrito = $datos['distrito'];
        $direccion->calle = $datos['calle'];
        // Guardamos la direccion en sesión
        $_SESSION['direccion'] = $direccion;
    }

    public function registrarDireccion($datos) {
        $direccion = new DireccionModel();
        if($direccion->registrar(["departamento" => $datos['departamento'], "provincia" => $datos['provincia'], "distrito" => $datos['distrito'], "calle" => $datos['calle']])) {
            return true;
        } else {
            return false;
        }
    }


}

?>