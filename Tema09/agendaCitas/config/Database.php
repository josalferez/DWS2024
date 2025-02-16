<?php

namespace config;

use PDO;

class Database {
    private $host = 'localhost'; // Cambia esto según tu configuración
    private $dbname = 'cita_app'; // Cambia esto según tu base de datos
    private $username = 'root'; // Cambia esto según tu usuario
    private $password = ''; // Cambia esto según tu contraseña
    private $pdo;

    public function __construct($host, $dbname, $username, $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }
}