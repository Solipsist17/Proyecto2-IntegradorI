<?php 

include_once 'models/productomodel.php';
include_once 'models/tallamodel.php';

class InventarioModel extends Model {

    public $idInventario;
    public $fechaActualizacion;
    public $cantidad;
    public $stockMin;
    public $stockMax;
    public $producto; // Relación con la clase Producto
    public $talla; // Relación con la clase Talla (idTalla)

    public function __construct() {
        parent::__construct();
    }
}

?>