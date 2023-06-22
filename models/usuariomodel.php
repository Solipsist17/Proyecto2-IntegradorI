<?php 

include_once 'models/rolmodel.php'; // traemos la clase Rol

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

    public function autenticar($datos) {

        $item = new UsuarioModel();

        $query = $this->db->connect()->prepare("SELECT * FROM usuario WHERE username = :username AND password = :password");
        try {
            $query->execute([
                'username' => $datos['username'],
                'password' => $datos['password'], 
            ]);

            while ($row = $query->fetch()) {
                $item->idUsuario = $row['idUsuario'];
                $item->rol = new RolModel();
                $item->rol->idRol = $row['idRol'];
                /* $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido']; */
            }

            if ($item->idUsuario !== null) { // si se encontraron valores
                return $item;
            } else {
                return null; // 
            }

        } catch(PDOException $e) {
            return null;
        }
    }

    public function modificar($item) {
        $query = $this->db->connect()->prepare("UPDATE usuario SET username = :username, password = :password, correo = :correo, nombre = :nombre, apellido = :apellido, dni = :dni, telefono = :telefono WHERE idUsuario = :idUsuario");
        try {
            $query->execute([
                'username' => $item['username'],
                'password' => $item['password'],
                'correo' => $item['correo'],
                'nombre' => $item['nombre'],
                'apellido' => $item['apellido'],
                'dni' => $item['dni'],
                'telefono' => $item['telefono'],
                'idUsuario' => $item['idUsuario']
            ]);
        
            return true;
        } catch(PDOException $e) {
            return false;
        }
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
        $item = new UsuarioModel();

        $query = $this->db->connect()->prepare("SELECT * FROM usuario WHERE idUsuario = :idUsuario");
        try {
            $query->execute(['idUsuario' => $id]);

            while ($row = $query->fetch()) {
                $item->idUsuario = $row['idUsuario'];
                $item->username = $row['username'];
                $item->password = $row['password'];
                $item->correo = $row['correo'];
                $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido'];
                $item->dni = $row['dni'];
                $item->telefono = $row['telefono'];
                $item->rol = new RolModel();
                $item->rol->idRol = $row['idRol'];
            }
            //var_dump($item);
            return $item;
        } catch(PDOException $e) {
            return null;
        }
        
        //var_dump($item);
    }

}

?>