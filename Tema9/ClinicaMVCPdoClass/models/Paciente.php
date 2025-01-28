<?php
// models/Paciente.php

namespace Models;

use PDO;

class Paciente extends BaseDatos {
    private $table = 'pacientes';

    public function __construct() {
        parent::__construct();
        $this->connect();
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->getConnection()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}