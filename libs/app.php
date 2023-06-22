<?php 
require_once "controllers/errores.php"; // Para manejar errores en caso existan

session_start(); // 

class App {

    /* Clase que va a centralizar todo, como un main */
    function __construct() {
        //echo "<p>Nueva App</p>";

        // Tratamiento de la url: http://localhost:8080/php-mvc/controller/method
        $url = isset($_GET['url']) ? $_GET['url'] : null ; 
        $url = rtrim($url, '/'); // quitamos las '/' del final de la cadena $url, en caso existan
        $url = explode('/', $url); // crea un array donde divide la cadena usando como delimitador '/'

        // Cuando se ingresa sin definir controlador
        if (empty($url[0])) { 
            $archivoController = 'controllers/main.php';
            require_once $archivoController;
            $controller = new Main();
            $controller->loadModel('main');
            $controller->render();

            return false; // salimos de este método
        } 

        // modificamos la url escrita por el usuario
        $archivoController = 'controllers/' . $url[0] . '.php';

        // Si el archivo existe entonces cargamos el controlador
        if (file_exists($archivoController)) { 
            require_once $archivoController; 

            // inicializar controlador
            $controller = new $url[0];  // ¿Cargar el modelo en el constructor del controlador?
            $controller->loadModel($url[0]); // cargamos el modelo

            // número de elementos del arreglo
            $nparam = sizeof($url);

            if ($nparam > 1) { // Si hay al menos un método que requiere cargar
                if ($nparam > 2) { // Si tiene parámetros
                    $param = [];
                    for ($i=2; $i<$nparam; $i++) {
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param); // enviamos los parámetros al método
                } else { // Sino solo validamos el método
                    //$methodName = $url[1];
                    //if (method_exists($controller, $methodName)) { // Si el método existe en el objeto
                        $controller->{$url[1]}(); // traemos el método de ese objeto
                        // La vista se muestra dentro del método después de las validaciones 
                    //}
                }
            } else { /////
                $controller->render(); // si no hay un método simplemente mostramos la vista
            }

            /* if (isset($url[1])) { // Si hay un método que requiere cargar
                $methodName = $url[1];
                if (method_exists($controller, $methodName)) { // Si el método existe en el objeto
                    $controller->{$url[1]}(); // traemos el método de ese objeto
                    // La vista se muestra dentro del método después de las validaciones 
                }
            } else {
                $controller->render(); // si no hay un método simplemente mostramos la vista
            } */

        } else {
            $controller = new Errores();
        } 
    }
}

?>