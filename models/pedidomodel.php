<?php 

class PedidoModel extends Model {

    public $idPedido;
    public $fecha;
    public $departamento;
    public $provincia;
    public $distrito;
    public $calle;
    public $estado;
    public $usuario; // Relación con la clase Usuario

    public function __construct() {
        parent::__construct();
    }
}

?>