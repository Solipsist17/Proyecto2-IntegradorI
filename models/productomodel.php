<?php 

include_once 'models/categoriamodel.php';
include_once 'models/ofertamodel.php';

class ProductoModel extends Model {

    public $idProducto;
    public $nombre;
    public $precio;
    public $descripcion;
    public $imagen;
    public $categoria; // idCategoria
    public $oferta; // idOferta

    public function __construct() {
        parent::__construct();
    }

    public function listar() { 
        /* $items = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM producto");

            while($row = $query->fetch()) {
                $item = new Alumno();
                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido'];

                array_push($items, $item);
            }

            return $items;
        } catch(PDOException $e) {
            return [];
        } */
    }

    public function listarPorCategoria($nombre) { 
        $items = [];

        $query = $this->db->connect()->prepare("SELECT * FROM Producto WHERE idCategoria = (SELECT idCategoria FROM Categoria WHERE nombre = :nombre)");

        try {
            $query->execute(['nombre' => $nombre]);

            while($row = $query->fetch()) {
                $item = new ProductoModel();
                $item->idProducto = $row['idProducto'];
                $item->nombre = $row['nombre'];
                $item->precio = $row['precio'];
                $item->descripcion = $row['descripcion'];
                $item->imagen = $row['imagen'];
                $item->categoria = new CategoriaModel();
                $item->categoria->idCategoria = $row['idCategoria'];
                $item->oferta = new OfertaModel();
                $item->oferta->idOferta = $row['idOferta'];

                array_push($items, $item);
            }

            return $items;
        } catch(PDOException $e) {
            return [];
        }
    }

}

?>