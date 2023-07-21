<?php 

include_once 'models/productomodel.php';
include_once 'models/tallamodel.php';

class InventarioModel extends Model {

    public $idInventario;
    public $fechaActualizacion;
    public $stock;
    public $stockMin;
    public $stockMax;
    public $producto; // Relación con la clase Producto
    public $talla; // Relación con la clase Talla (idTalla)

    public function __construct() {
        parent::__construct();
    }

    public function registrar($datos) { 
        // insertar datos en la bd
        try {
            $query = $this->db->connect()->prepare("INSERT INTO inventario(fechaActualizacion, stock, stockMin, stockMax, idProducto, idTalla) VALUES(:fechaActualizacion, :stock, :stockMin, :stockMax, :idProducto, :idTalla)");
            $query->execute([
                'fechaActualizacion' => $datos['fechaActualizacion'],
                'stock' => $datos['stock'],
                'stockMin' => $datos['stockMin'],
                'stockMax' => $datos['stockMax'],
                'idProducto' => $datos['idProducto'],
                'idTalla' => $datos['idTalla']
            ]);

            return true; 
        } catch(PDOException $e) {
            //echo $e->getMessage();
            return false;
        } 
    }

    public function actualizar($datos) { 
        // modificar datos en la bd
        try {
            $query = $this->db->connect()->prepare("UPDATE inventario SET fechaActualizacion = (select now()), stock = :stock WHERE idProducto = :idProducto and idTalla = :idTalla");
            $query->execute([
                'stock' => $datos['stock'],
                'idProducto' => $datos['idProducto'],
                'idTalla' => $datos['idTalla']
            ]);

            return true; 
        } catch(PDOException $e) {
            //echo $e->getMessage();
            return false;
        } 
    }

    public function actualizarPorUno($datos) { 
        // modificar datos en la bd
        try {
            $query = $this->db->connect()->prepare("UPDATE inventario SET fechaActualizacion = (select now()), stock = stock - 1 WHERE idProducto = :idProducto and idTalla = :idTalla");
            $query->execute([
                'idProducto' => $datos['idProducto'],
                'idTalla' => $datos['idTalla']
            ]);

            return true; 
        } catch(PDOException $e) {
            return false;
        } 
    }

    public function consultarPorIdProducto($id) {
        $items = [];

        $query = $this->db->connect()->prepare("SELECT * FROM inventario WHERE idProducto = :idProducto");
        try {
            $query->execute([
                'idProducto' => $id
            ]);

            while ($row = $query->fetch()) {
                $item = new InventarioModel();
                $item->fechaActualizacion = $row['fechaActualizacion'];
                $item->stock = $row['stock'];
                $item->stockMin = $row['stockMin'];
                $item->stockMax = $row['stockMax'];
                $item->producto = new ProductoModel();
                $item->producto->idProducto = $row['idProducto'];
                $item->talla = new TallaModel();
                $item->talla->idTalla = $row['idTalla'];

                array_push($items, $item);
            }
            //var_dump($item);
            return $items;
        } catch(PDOException $e) {
            return null;
        }
        
        //var_dump($item);
    }

    public function consultarPorIds($datos) {
        $item = new InventarioModel();

        $query = $this->db->connect()->prepare("SELECT * FROM inventario WHERE idProducto = :idProducto AND idTalla = :idTalla");
        try {
            $query->execute([
                'idProducto' => $datos['idProducto'],
                'idTalla' => $datos['idTalla']
            ]);

            while ($row = $query->fetch()) {
                $item = new InventarioModel();
                $item->fechaActualizacion = $row['fechaActualizacion'];
                $item->stock = $row['stock'];
                $item->stockMin = $row['stockMin'];
                $item->stockMax = $row['stockMax'];
                $item->producto = new ProductoModel();
                $item->producto->idProducto = $row['idProducto'];
                $item->talla = new TallaModel();
                $item->talla->idTalla = $row['idTalla'];
            }
            //var_dump($item);
            return $item;
        } catch(PDOException $e) {
            return null;
        }
        
        //var_dump($item);
    }

}

?>