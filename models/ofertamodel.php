<?php 

class OfertaModel extends Model {

    public $idOferta;
    public $descuento;
    public $fechaInicio;
    public $fechaFin;

    public function __construct() {
        parent::__construct();
    }

    public function consultarOferta($id) {
        $item = new OfertaModel();

        $query = $this->db->connect()->prepare("SELECT * FROM oferta WHERE idOferta = :idOferta");
        try {
            $query->execute(['idOferta' => $id]);

            while ($row = $query->fetch()) {
                $item->idOferta = $row['idOferta'];
                $item->descuento = $row['descuento'];
                $item->fechaInicio = $row['fechaInicio'];
                $item->fechaFin = $row['fechaFin'];
            }

            return $item;
        } catch(PDOException $e) {
            return null;
        }
    }

}

?>