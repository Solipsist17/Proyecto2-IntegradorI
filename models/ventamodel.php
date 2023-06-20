<?php 

class VentaModel extends Model {

    public $idVenta;
    public $total;
    public $fecha;
    public $metodoPago;
    public $pedido; // Relación con la clase Pedido

    public function __construct() {
        parent::__construct();
    }
}

?>