<?php 

class OfertaModel extends Model {

    public $idOferta;
    public $precioOferta;
    public $fechaInicio;
    public $fechaFin;
    public $producto; // Relación con la clase Producto

    public function __construct() {
        parent::__construct();
    }
}

?>