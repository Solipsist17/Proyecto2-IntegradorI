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
}

?>