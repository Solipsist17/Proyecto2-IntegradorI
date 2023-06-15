<?php 

class PruebaModel extends Model{

    public function __construct() {
        parent::__construct();
    }

    // Operaciones con los datos
    public function insert() {
        // insertar datos en la bd
        echo "insertar datos";
        //$this->db->connect();
    }

    public function update() {
        echo "modificar datos";
    }
}

?>