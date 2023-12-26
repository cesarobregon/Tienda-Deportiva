<?php
class Database{
    private $host = "localhost";
    private $usuario = "root";
    private $password = "";
    private $db = "tienda_deportiva";
    private $charset = "utf8";

    function Conectar(){
        try {
            $conexion = "mysql:host=". $this->host . "; dbname=". $this->db ."; charset=". $this->charset;
            $options= [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
            ];
            $pdo = new PDO($conexion, $this->usuario, $this->password, $options);
            return $pdo;
        } catch (PDOException $exPhpPDO) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $exPhpPDO->getMessage();
            exit;
        }
    }
}
?>