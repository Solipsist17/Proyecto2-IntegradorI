<?php 

class DireccionModel extends Model {

    public $idDireccion;
    public $departamento;
    public $provincia;
    public $distrito; 
    public $calle; 

    public function __construct() {
        parent::__construct();
    }

    public function registrar($datos) { 
        // insertar datos en la bd
        try {
            $query = $this->db->connect()->prepare("INSERT INTO direccion(departamento, provincia, distrito, calle) VALUES(:departamento, :provincia, :distrito, :calle)");
            $query->execute([
                'departamento' => $datos['departamento'],
                'provincia' => $datos['provincia'],
                'distrito' => $datos['distrito'],
                'calle' => $datos['calle']
            ]);
            return true;
        } catch(PDOException $e) {
            //echo $e->getMessage();
            return false;
        } 
    }
}

?>