<?php 

class OfertaModel extends Model /* implements Serializable */ {

    public $idOferta;
    public $descuento;
    public $fechaInicio;
    public $fechaFin;

    public function __construct() {
        parent::__construct();
    }

    /* public function serialize() {
        return serialize([
            $this->idOferta,
            $this->descuento,
            $this->fechaInicio,
            $this->fechaFin
        ]);
    }

    public function unserialize($serialized) {
        [
            $this->idOferta,
            $this->descuento,
            $this->fechaInicio,
            $this->fechaFin
        ] = unserialize($serialized);
    } */

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