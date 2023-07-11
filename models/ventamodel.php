<?php 

class VentaModel extends Model {
    // Modificar esto
    public $idVenta;
    public $total;
    public $fecha;
    public $metodoPago;
    public $pedido; // Relación con la clase Pedido

    public function __construct() {
        parent::__construct();
    }

    public function registrar($datos) { 
        // insertar datos en la bd
        try {
            $query = $this->db->connect()->prepare("INSERT INTO venta(id_transaccion, total, fecha, status, email, id_cliente) VALUES(:id_transaccion, :total, :fecha, :status, :email, :id_cliente)");
            $query->execute([
                'id_transaccion' => $datos['id_transaccion'],
                'total' => $datos['total'],
                'fecha' => $datos['fecha'],
                'status' => $datos['status'],
                'email' => $datos['email'],
                'id_cliente' => $datos['id_cliente']
            ]);
            return true;
        } catch(PDOException $e) {
            //echo $e->getMessage();
            return false;
        } 
    }
}

?>