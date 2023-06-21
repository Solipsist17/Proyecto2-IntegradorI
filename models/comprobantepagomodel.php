<?php 

class ComprobantePagoModel extends Model {

    public $idComprobante;
    public $tipoComprobante;
    public $venta; // Relación con la clase Venta

    public function __construct() {
        parent::__construct();
    }

}

?>