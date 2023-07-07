<?php 

class PedidoModel extends Model {

    public $idPedido;
    public $fecha;
    public $estado;
    public $usuario; // Relación con la clase Usuario
    public $direccion; // Relación con la clase Direccion (idDireccion)

    public function __construct() {
        parent::__construct();
    }
}

?>