<?php 

include_once 'models/alumno.php'; // traemos la clase Alumno

class ConsultaModel extends Model{

    public function __construct() {
        parent::__construct();
    }

    // Operaciones con los datos
    public function get() { // función para obtener datos
        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM alumnos");

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
        }
    }

}


?>