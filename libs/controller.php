<?php 

// Clase base para todos los controladores 
class Controller { 

    function __construct() {
        //echo "<p>Controlador base</p>";
        $this->view = new View(); // Creamos un objeto de la clase View 
    }

    function loadModel($model) {
        $url = 'models/'.$model.'model.php';

        if (file_exists($url)) {
            require $url;

            $modelName = $model.'Model';
            $this->model = new $modelName(); // Instanciamos el modelo
            /* echo "<br>";
            echo "modelname: " . $modelName;
            echo "<br>";
            echo "model: " . $model; */
        }
    }

}

?>