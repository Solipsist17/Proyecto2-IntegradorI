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

    public function registrar($datos) { 
        // insertar datos en la bd
        try {
            $query = $this->db->connect()->prepare("INSERT INTO detalleventa(cantidad, precioUnitario, subtotal, idVenta, idProducto) VALUES(:cantidad, :precioUnitario, :subtotal, :idVenta, :idProducto)");
            $query->execute([
                'cantidad' => $datos['cantidad'],
                'precioUnitario' => $datos['precioUnitario'],
                'subtotal' => $datos['subtotal'],
                'idVenta' => $datos['idVenta'],
                'idProducto' => $datos['idProducto']
            ]);

            return true; 
        } catch(PDOException $e) {
            //echo $e->getMessage();
            return false;
        } 
    }
}

?>