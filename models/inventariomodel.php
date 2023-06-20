<?php 

class InventarioModel extends Model {

    public $idInventario;
    public $fechaActualizacion;
    public $cantidad;
    public $stockMin;
    public $stockMax;
    public $producto; // Relación con la clase Producto

    public function __construct() {
        parent::__construct();
    }
}

?>