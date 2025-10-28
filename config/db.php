<?php

class db {
    private $dbHost = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName = "iboss"; //nombre de nuestra bd
    private $port = 3307;

    public function conexion() {
        try {
            $PDO = new PDO("mysql:host={$this->dbHost};port={$this->port};dbname={$this->dbName};charset=utf8", $this->dbUsername, $this->dbPassword);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$PDO = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword);
            //echo "Conexión exitosa";
            return $PDO;
        } catch(PDOException $e) {
            //echo "Error en la conexión: " . $e->getMessage();
            return null;
        }
    }

    public function validateConnection() {
        $connection = $this->conexion();
        if ($connection) {
            echo "Conexión a la base de datos fue exitosa.";
        } else {
            echo "Hubo un error al intentar conectar a la base de datos.";
        }
    }
}
?>