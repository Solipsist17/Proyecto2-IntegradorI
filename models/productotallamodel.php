<?php 

class ProductoTallaModel extends Model {

    public $producto; // Relación con la clase Producto
    public $talla; // Relación con la clase Talla

    public function __construct() {
        parent::__construct();
    }
}

?>