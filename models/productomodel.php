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

    public function consultarPorId($id) {
        $item = new ProductoModel();

        $query = $this->db->connect()->prepare("SELECT * FROM producto WHERE idProducto = :idProducto");
        try {
            $query->execute(['idProducto' => $id]);

            while ($row = $query->fetch()) {
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
            }
            //var_dump($item);
            return $item;
        } catch(PDOException $e) {
            return null;
        }
        
        //var_dump($item);
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

    function calcularSubTotal($productosCarrito) { // calcula el subtotal del array de productos
        $subtotal = 0;
        foreach ($productosCarrito as $elemento) {
            
            // Aplicar descuento en el subtotal ¿?
            
            /* if ($elemento->oferta->idOferta != null) { 
                include_once("models/ofertamodel.php");
                $oferta = new OfertaModel();
                $descuento = $oferta->consultarOferta($producto->oferta->idOferta);
                $elemento->precio = $elemento->precio * (1 - $descuento);
            } */
            $unidades = $elemento->unidades;
            $precio = $elemento->precio;
            
            $subtotal += ($unidades * $precio);
        }
        return $subtotal;
    }

    function gestionarCarrito($data) { // Agrega o elimina elementos del carrito según la acción
        //session_abort();
        session_write_close();
        // debemos incluir las clases antes de iniciar la sesión para que las definiciones de clase estén disponibles cuando los objetos se serializan y deserializan
        //include_once 'models/productomodel.php'; 
        //include_once 'models/categoriamodel.php';
        //include_once 'models/ofertamodel.php';
        session_start();
        $productosCarrito = isset($_SESSION['productosCarrito']) ? $_SESSION['productosCarrito'] : [];

        $id = $data['id'];
        $accion = $data['accion'];
        $unidades = intval($data['unidades']);
        $talla = $data['talla'];

        if ($accion == "agregar") {
            $producto = $this->consultarPorId($id);
            //if (!in_array($producto, $productosCarrito)) { // verificamos si no existe en el array carrito
            $existe = false;
            foreach ($productosCarrito as $elemento) { 
                if ($elemento->idProducto == $id) { // Verificamos si existe 
                    $existe=true;
                }    
            }
            if (!$existe) { // si no existe entonces lo agregamos
                // Consultamos las tallas y stock disponibles de ese producto
                include_once 'models/inventariomodel.php';
                include_once 'models/tallamodel.php';
                $inventario = new InventarioModel();
                $inventarios = [];
                $inventarios = $inventario->consultarPorIdProducto($id);
                $tallasDisponibles = [];
                foreach ($inventarios as $inventario) {
                    if (isset($inventario->talla->idTalla) && $inventario->stock > 0) {
                        array_push($tallasDisponibles, $inventario->talla->idTalla);
                    }
                }
                $producto->tallasDisponibles = $tallasDisponibles; // agregamos las tallas
                $producto->unidades = $unidades; // agregamos las unidades
                $producto->talla = $talla; // agregamos la talla seleccionada

                array_push($productosCarrito, $producto);
                $_SESSION['productosCarrito'] = $productosCarrito;
            }
            //}
            
        } elseif ($accion == "quitar") {
            $producto = $this->consultarPorId($id);
            foreach ($productosCarrito as $clave => $elemento) { 
                if ($elemento->idProducto == $id) { // Verificamos si existe 
                    $indice = $clave;
                    unset($productosCarrito[$indice]);
                    $productosCarrito = array_values($productosCarrito); // reorganizamos los índices
                    $_SESSION['productosCarrito'] = $productosCarrito;
                }    
            }

            // Consultamos las tallas y stock disponibles de ese producto
            /* include_once 'models/inventariomodel.php';
            include_once 'models/tallamodel.php';
            $inventario = new InventarioModel();
            $inventarios = [];
            $inventarios = $inventario->consultarPorIdProducto($id);
            $tallasDisponibles = [];
            foreach ($inventarios as $inventario) {
                if (isset($inventario->talla->idTalla) && $inventario->stock > 0) {
                    array_push($tallasDisponibles, $inventario->talla->idTalla);
                }
            }
            $producto->tallasDisponibles = $tallasDisponibles; // agregamos las tallas
            $producto->unidades = $unidades; // agregamos las unidades

            if (in_array($producto, $productosCarrito)) { // Verificamos si existe en el array carrito
                $indice = array_search($producto, $productosCarrito);
                unset($productosCarrito[$indice]);
                $productosCarrito = array_values($productosCarrito); // reorganizamos los índices
                $_SESSION['productosCarrito'] = $productosCarrito;
            } */
        } elseif ($accion == "modificar") {
            $producto = $this->consultarPorId($id);
            foreach ($productosCarrito as $clave => $elemento) { 
                if ($elemento->idProducto == $id) { // Verificamos si existe 
                    //$indice = $clave;
                    $elemento->unidades = $unidades;
                    $elemento->talla = $talla; 
                    $_SESSION['productosCarrito'] = $productosCarrito;
                }    
            } 
        }
             
        $data = [
            'productosCarrito' => $productosCarrito,
            'subtotal' => $this->calcularSubTotal($productosCarrito)
        ];

        //$encodedBase64 = base64_encode(json_encode($data));
        
        //$data['encodedBase64'] = $encodedBase64; // Data codificada a base 64
        //array_push($data, $encodedArray);
        //$data = array_values($data);


        $_SESSION['datosCompra'] = $data; // ESTO 


        return json_encode($data);
    }


}

?>