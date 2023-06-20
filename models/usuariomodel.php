<?php 

class UsuarioModel extends Model {

    public $idUsuario;
    public $username;
    public $password;
    public $correo;
    public $nombre;
    public $apellido;
    public $dni;
    public $telefono;
    public $rol; // idRol

    public function __construct() {
        parent::__construct();
    }

    public function registrar($datos) {
        // insertar datos en la bd
        try {
            $query = $this->db->connect()->prepare("INSERT INTO usuario(username, password, correo, nombre, apellido, idRol) VALUES(:username, :password, :correo, :nombre, :apellido, :idRol)");
            $query->execute([
                'username' => $datos['username'],
                'password' => $datos['password'],
                'correo' => $datos['correo'],
                'nombre' => $datos['nombre'], 
                'apellido' => $datos['apellido'],
                'idRol' => $datos['idRol']
            ]);
            return true;
        } catch(PDOException $e) {
            //echo $e->getMessage();
            return false;
        } 
    }

    public function modificar($item) {
        /* $query = $this->db->connect()->prepare("UPDATE alumnos SET nombre = :nombre, apellido = :apellido WHERE matricula = :matricula");
        try {
            $query->execute([
                'matricula' => $item['matricula'],
                'nombre' => $item['nombre'],
                'apellido' => $item['apellido']
            ]);
        
            return true;
        } catch(PDOException $e) {
            return false;
        } */
    }

    public function eliminar($id) {
        /* $query = $this->db->connect()->prepare("DELETE FROM alumnos WHERE matricula = :id");
        try {
            $query->execute([
                'id' => $id
            ]);
        
            return true;
        } catch(PDOException $e) {
            return false;
        } */
    }

    public function listar() {
        /* $items = [];

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
        } */
    }

    public function consultarPorId($id) {
        /* $item = new Alumno();

        $query = $this->db->connect()->prepare("SELECT * FROM alumnos WHERE matricula = :matricula");
        try {
            $query->execute(['matricula' => $id]);

            while ($row = $query->fetch()) {
                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido'];
            }

            return $item;
        } catch(PDOException $e) {
            return null;
        } */
    }

}

?>