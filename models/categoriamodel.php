<?php 

class CategoriaModel extends Model /* implements Serializable */ {

    public $idCategoria;
    public $nombre;

    public function __construct() {
        parent::__construct();
    }

    /* public function serialize() {
        return serialize([
            $this->idCategoria,
            $this->nombre
        ]);
    }

    public function unserialize($serialized) {
        [
            $this->idCategoria,
            $this->nombre
        ] = unserialize($serialized);
    } */

}

?>