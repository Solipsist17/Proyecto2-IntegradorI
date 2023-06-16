<?php 
require_once "controllers/errores.php"; // Para manejar errores en caso existan
  
class App {

    /* Clase que va a centralizar todo, como un main */
    function __construct() {
        //echo "<p>Nueva App</p>";

        // Tratamiento de la url: http://localhost:8080/php-mvc/controller/method
        $url = isset($_GET['url']) ? $_GET['url'] : null ; 
        $url = rtrim($url, '/'); // quitamos las '/' del final de la cadena $url, en caso existan
        $url = explode('/', $url); // crea un array donde divide la cadena usando como delimitador '/'

        if (empty($url[0])) { // si la url está vacía mandamos a main
            $archivoController = 'controllers/main.php';
            require_once $archivoController;
            $controller = new Main();
            $controller->loadModel('main');

            return false; // salimos de este método
        } 

        // modificamos la url escrita por el usuario
        $archivoController = 'controllers/' . $url[0] . '.php';

        // Si el archivo existe entonces cargamos el controlador
        if (file_exists($archivoController)) { 
            require_once $archivoController; 
            $controller = new $url[0]; // creamos una instancia de ese objeto
            $controller->loadModel($url[0]); // cargamos el modelo

            if (isset($url[1])) { // Validamos el valor dentro del array
                $methodName = $url[1];
                if (method_exists($controller, $methodName)) { // Si el método existe en el objeto
                    $controller->{$url[1]}(); // traemos el método de ese objeto
                }
            } 

        } else {
            $controller = new Errores();
        } 
    }
}

?>