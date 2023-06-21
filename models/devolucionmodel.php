<?php 

class DevolucionModel extends Model {

    public $idDevolucion;
    public $fecha;
    public $motivo;
    public $estado;
    public $detalleVenta; // Relación con la clase DetalleVenta

    public function __construct() {
        parent::__construct();
    }
}

?>