<?php 

class PruebaModel extends Model{

    public function __construct() {
        parent::__construct();
    }

    // Operaciones con los datos
    public function insert($datos) {
        // insertar datos en la bd
        try {
            $query = $this->db->connect()->prepare("INSERT INTO alumnos(matricula, nombre, apellido) VALUES(:matricula, :nombre, :apellido)");
            $query->execute(['matricula' => $datos['matricula'], 'nombre' => $datos['nombre'], 'apellido' => $datos['apellido']]);
            return true;
        } catch(PDOException $e) {
            //echo $e->getMessage();
            //echo "Ya existe esa matrícula";
            return false;
        } 
    }

    public function update() {
        echo "modificar datos";
    }
}

?>