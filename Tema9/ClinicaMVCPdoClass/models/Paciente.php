<?php
// models/Paciente.php

namespace Models;

use Lib\BaseDatos;
use PDO;

class Paciente extends BaseDatos {
    private $table = 'pacientes';

    public function __construct() {
        parent::__construct();
        $this->connect();
    }

    // Método para obtener todos los pacientes
    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->getConnection()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para guardar un nuevo paciente
    public function guardar($nombre, $email, $telefono) {
        $sql = "INSERT INTO {$this->table} (nombre, email, telefono) VALUES (:nombre, :email, :telefono)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':telefono' => $telefono,
        ]);
    }
}