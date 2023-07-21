<?php 

class Checkout extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->mensaje = ""; 
        $this->view->data = "";
         
        //echo "<p>Error al cargar recurso</p>";
    }

    function render() {
        $this->view->render('checkout/index');
    }

    function direccion() {
        $this->view->render('checkout/direccion');
    }

    function pago() {
        $this->view->render('checkout/pago');
    }

    function completado() {
        $this->view->render('checkout/completado');
    }

    function verificarDireccion() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            /* include_once 'models/productomodel.php';
            include_once 'models/categoriamodel.php';
            include_once 'models/ofertamodel.php';
            session_write_close();
            session_start();
            $data = $_POST['data']; */
            
            if (isset($_POST['enviar'])) {
                //$this->view->data = $this->model->verificarDireccion($_POST['data']);
                $departamento = $_POST['departamento'];
                $provincia = $_POST['provincia'];
                $distrito = $_POST['distrito'];
                $calle = $_POST['calle'];

                // Guardamos los datos de la direccion en sesión
                $this->model->guardarDireccion(["departamento" => $departamento, "provincia" => $provincia, "distrito" => $distrito, "calle" => $calle]);
                header('Location: ' . constant('URL') . 'checkout/pago');
                exit;

                // Registramos los datos de la direccion
                /* if($this->model->registrarDireccion(["departamento" => $departamento, "provincia" => $provincia, "distrito" => $distrito, "calle" => $calle])) {
                    //echo "direccion verificada";

                    header('Location: ' . constant('URL') . 'checkout/pago');
                    
                    exit;
                    // También registrar el pedido con dicha dirección
                    // verificarPedido();
                    // Almacenar el idPedido en session
                } else {
                    echo "Error";
                } */
            }
        
            $this->view->render('checkout/direccion');
        } else {
            header('Location: ' . constant('URL') . 'producto');
            //$this->view->render('producto/index');
        }
    }

    function procesarPago() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $jsonData = file_get_contents('php://input'); // Obtener el contenido del cuerpo de la solicitud
            $data = json_decode($jsonData, true); // Decodificar la cadena JSON en un arreglo asociativo
            if (is_array($data)) {
                // Datos de venta
                $id_transaccion = $data['detalles']['id'];
                $monto = $data['detalles']['purchase_units'][0]['amount']['value'];
                $status = $data['detalles']['status'];
                $fecha = $data['detalles']['update_time'];
                date_default_timezone_set('America/Lima');
                $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
                $email = $data['detalles']['payer']['email_address'];
                $id_cliente = $data['detalles']['payer']['payer_id'];

                // Datos de envío
                $envio_calle = $data['detalles']['purchase_units'][0]['shipping']['address']['address_line_1'];
                $envio_direccion = $data['detalles']['purchase_units'][0]['shipping']['address']['admin_area_1'];
                $envio_ciudad = $data['detalles']['purchase_units'][0]['shipping']['address']['admin_area_2'];
                $codigo_pais = $data['detalles']['purchase_units'][0]['shipping']['address']['country_code'];
                $codigo_postal = $data['detalles']['purchase_units'][0]['shipping']['address']['postal_code'];
                $envio_nombre = $data['detalles']['purchase_units'][0]['shipping']['name']['full_name'];
                
                // Registramos la venta
                if (($lastInsertId = $this->model->registrarVenta(["id_transaccion" => $id_transaccion, "total" => $monto, "fecha" => $fecha_nueva, "status" => $status, "email" => $email, "id_cliente" => $id_cliente])) !== null) {

                    // Aquí registrar el pedido con el id de la venta
                    if ($this->model->registrarPedido(["calle" => $envio_calle, "direccion" => $envio_direccion, "ciudad" => $envio_ciudad, "cod_pais" => $codigo_pais, "cod_postal" => $codigo_postal, "nombre" => $envio_nombre, "idVenta" => $lastInsertId])) {
                        $_SESSION['mensaje'] = "Venta exitosa!";
                    } else {
                        /* $prueba = [
                            "error" => $lastInsertId
                        ]; */
                    }

                    // Aquí registrar el detalleVenta
                    // falta registrar la cantidad por cada producto
                    include_once 'models/productomodel.php';
                    include_once 'models/categoriamodel.php';
                    include_once 'models/ofertamodel.php';
                    session_write_close();
                    session_start();
                    
                    $productos = isset($_SESSION['datosCompra']['productosCarrito']) ? $_SESSION['datosCompra']['productosCarrito'] : []; 
                    $prueba = [];

                    foreach ($productos as $producto) {
                        $idProducto = $producto->idProducto;
                        $precio = $producto->precio; 
                        $cantidad = $producto->unidades;
                        $subtotal = $precio*$cantidad;

                        $stock = 0;
                        $stockActual = 0;

                        if ($this->model->registrarDetalleVenta(["cantidad" => $cantidad, "precioUnitario" => $precio, "subtotal" => $subtotal, "idVenta" => $lastInsertId, "idProducto" => $idProducto])) {
                            
                            //$prueba['clave'] = "bien";
                            
                            
                        } /* else {
                            
                            //array_push($prueba, "mal");
                        } */

                        // Actualizar el inventario
                        // primero consultar el inventario
                        include_once 'models/inventariomodel.php';
                        session_write_close();
                        session_start();
                        $idTalla = $producto->talla; // Talla 
                        $inventario = $this->model->consultarInventario(["idProducto" => $idProducto, "idTalla" => $idTalla]);
                        
                        $stock = $inventario->stock; 
                        $stockActual = $stock - $cantidad;
                        
                        if ($this->model->actualizarInventario(["stock" => $stockActual, "idProducto" => $idProducto, "idTalla" => $idTalla])) {
                            $prueba = [
                                "bien" => "bien"
                            ];
                        } else {
                            $prueba = [ 
                                "mal" => "mal"
                            ];
                        }
                    } 

                } else {
                    $_SESSION['mensaje'] = "Error";
                }
                
                // ELiminamos los datos de la compra y carrito de sesión
                unset($_SESSION['datosCompra']);
                unset($_SESSION['productosCarrito']);

                echo json_encode($prueba);
                
                exit();
                
            }
            
        }
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
            
            //$_SESSION['mensajeUsuario'] = "Registro exitoso, ingrese con su cuenta";
            $this->view->mensaje = "Registro exitoso, ingrese con su cuenta";
            $this->render();
            //header('Location: ' . constant('URL') . 'login');
        } else {
            $mensaje = "Error en el registro";
            $this->view->render('registro/index');
        }

        //$this->view->mensaje = $mensaje; // Asignamos el mensaje al objeto de la vista
        
    }
    
}

?>