<?php 

class DetalleVentaModel extends Model {

    public $idDetalleVenta;
    public $cantidad;
    public $precioUnitario;
    public $subtotal;
    public $venta; // Relación con la clase Venta
    public $producto; // Relación con la clase Producto

    public function __construct() {
        parent::__construct();
    }
}

?>