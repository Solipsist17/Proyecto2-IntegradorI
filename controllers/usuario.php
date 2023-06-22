<?php 


class Usuario extends Controller {

    function __construct() {
        parent::__construct();
         
        $this->view->mensaje = "";
        //echo "<p>Error al cargar recurso</p>";
    }

    function render() {
        $this->view->render('login/index');
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
            
            $_SESSION['mensajeUsuario'] = "Registro exitoso, ingrese con su cuenta";
            //$this->render();
            header('Location: ' . constant('URL') . 'login');
        } else {
            $mensaje = "Error en el registro";
            $this->view->render('registro/index');
        }

        $this->view->mensaje = $mensaje; // Asignamos el mensaje al objeto de la vista
        
    }

    function iniciarSesion() {
        //header('Location: ' . constant('URL'));
        $username = $_POST['username'];
        $password = $_POST['password'];

        $usuario = $this->model->autenticar(["username" => $username, "password" => $password]); // llamamos a la función que retorna al objeto usuario

        if ($usuario !== null) {
            // El objeto $usuario no es null, el usuario ha sido autenticado correctamente
            $_SESSION['idUsuario'] = $usuario->idUsuario; // Se consulta a la session para comprar productos
            $_SESSION['idRol'] = $usuario->rol->idRol;
            header('Location: ' . constant('URL') . 'producto');
            /* echo $usuario->idUsuario;
            echo "<br>";
            echo $usuario->rol->idRol */;

        } else {
            // El objeto $usuario es null, la autenticación ha fallado
            $this->view->mensaje = "Autenticación fallida";
            $this->render();
        }

        /* $_SESSION['id_verAlumno'] = $alumno->matricula; // guardamos en la variable de session 

        $this->view->alumno = $alumno; // guardamos en el objeto alumno 
        $this->view->mensaje = ""; // lo asignamos como vacío
        $this->view->render('consulta/detalle'); */
    }

    function prueba() {
        $this->render();
    }

    /* function actualizarAlumno() {
        echo "Alumno actualizado";
        $this->model->update();
    } */
}

?>