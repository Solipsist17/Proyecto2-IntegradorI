<?php 

class ProductoModel extends Model {

    public $idProducto;
    public $nombre;
    public $precio;
    public $categoria;
    public $modelo;
    public $marca;

    public function __construct() {
        parent::__construct();
    }
}

?>