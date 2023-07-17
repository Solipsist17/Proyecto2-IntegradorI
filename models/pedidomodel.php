<?php 
// Lo cambiamos por `ENVIO`
class PedidoModel extends Model {

    public $idPedido;
    public $calle;
    public $direccion;
    public $ciudad; 
    public $cod_pais;
    public $cod_postal; 
    public $nombre;
    public $idVenta; // Relación con la clase Venta

    public function __construct() {
        parent::__construct();
    }

    public function registrar($datos) { 
        // insertar datos en la bd
        try {
            $query = $this->db->connect()->prepare("INSERT INTO pedido(calle, direccion, ciudad, cod_pais, cod_postal, nombre, idVenta) VALUES(:calle, :direccion, :ciudad, :cod_pais, :cod_postal, :nombre, :idVenta)");
            $query->execute([
                'calle' => $datos['calle'],
                'direccion' => $datos['direccion'],
                'ciudad' => $datos['ciudad'],
                'cod_pais' => $datos['cod_pais'],
                'cod_postal' => $datos['cod_postal'],
                'nombre' => $datos['nombre'],
                'idVenta' => $datos['idVenta']
            ]);

            return true; 
        } catch(PDOException $e) {
            //echo $e->getMessage();
            return false;
        } 
    }

}

?>