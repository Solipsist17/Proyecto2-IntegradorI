<?php 

class Database {

    private $host;
    private $db;
    private $user;
    private $password;
    private $port;
    private $charset;


    public function __construct() {
        $this->host = constant('HOST');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->db = constant('DB');
        $this->port = constant('PORT');
        $this->charset = constant('CHARSET');
    }

    public function connect() {
        try {
            $connection = "mysql:host=$this->host;dbname=$this->db;port=$this->port;charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES  => false,
            ];

            $pdo = new PDO($connection, $this->user, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            print_r("Error de conexión: " . $e->getMessage());
        }
    }
}

?>