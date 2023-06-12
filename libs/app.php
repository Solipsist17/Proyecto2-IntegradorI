<?php 
require_once "controllers/error.php"; // Para manejar errores en caso existan
 
class App {

    /* Clase que va a centralizar todo, como un main */
    function __construct() {
        echo "<p>Nueva App</p>";

        // Tratamiento de la url: http://localhost:8080/php-mvc/controller/method
        $url = $_GET['url']; 
        $url = rtrim($url, '/'); // quitamos las '/' del final de la cadena $url, en caso existan
        $url = explode('/', $url); // crea un array donde divide la cadena usando como delimitador '/'

        // modificamos la url escrita por el usuario
        $archivoController = 'controllers/' . $url[0] . '.php';

        // Si el archivo existe entonces cargamos el controlador
        if (file_exists($archivoController)) { 
            require_once $archivoController; 
            $controller = new $url[0]; // creamos una instancia de ese objeto

            if (isset($url[1])) { // Validamos el valor dentro del array
                $methodName = $url[1];
                if (method_exists($controller, $methodName)) { // Si el método existe en el objeto
                    $controller->{$url[1]}(); // traemos el método de ese objeto
                }
            } 

        } else {
            $controller = new ErrorController();
        } 
    }
}

?>