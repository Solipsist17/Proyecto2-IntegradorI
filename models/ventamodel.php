<?php 

class VentaModel extends Model {
    // Modificar esto
    public $idVenta;
    public $id_transaccion;
    public $total;
    public $fecha;
    public $status;
    public $email;
    public $id_cliente;

    public function __construct() {
        parent::__construct();

        // Inicializar la conexión a la base de datos
        $this->connection = $this->db->connect();
    }

    public function registrar($datos) { 
        // insertar datos en la bd
        try {
            $query = $this->connection->prepare("INSERT INTO venta(id_transaccion, total, fecha, status, email, id_cliente) VALUES(:id_transaccion, :total, :fecha, :status, :email, :id_cliente)");
            $query->execute([
                'id_transaccion' => $datos['id_transaccion'],
                'total' => $datos['total'],
                'fecha' => $datos['fecha'],
                'status' => $datos['status'],
                'email' => $datos['email'],
                'id_cliente' => $datos['id_cliente']
            ]);

            $lastInsertId = $this->connection->lastInsertId();

            return $lastInsertId; 
        } catch(PDOException $e) {
            //echo $e->getMessage();
            return null;
        } 
    }
}

?>