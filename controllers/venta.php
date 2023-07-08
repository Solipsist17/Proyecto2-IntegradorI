<?php 

class Venta extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->mensaje = ""; 
        $this->view->data = "";
         
        //echo "<p>Error al cargar recurso</p>";
    }

    function render() {
        $this->view->render('venta/index');
    }

    function verificarDireccion() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            //$data = $_POST['data'];
            //$this->view->data = $data;
            if (isset($_POST['enviar'])) {
                echo "direccion verificada";
                // AQUI ENVIAR LOS DATOS DE LA DIRECCION A LA BD
            }
        
            $this->view->render('venta/direccion');
        } else {
            $this->view->render('producto/index');
        }
    }

    function verificarPago() {
        $this->view->render('venta/pago');
    }

    /* function verAlumno($param = null) {
        $idAlumno = $param[0];
        $alumno = $this->model->getById($idAlumno); // llamamos a la función que retorna el id

        session_start();
        $_SESSION['id_verAlumno'] = $alumno->matricula; // guardamos en la variable de session 

        $this->view->alumno = $alumno; // guardamos en el objeto alumno 
        $this->view->mensaje = ""; // lo asignamos como vacío
        $this->view->render('consulta/detalle');
    } */
    
}

?>