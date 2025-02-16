<?php
// models/Doctor.php

namespace Models;

use Lib\BaseDatos;
use PDO;

class Doctor extends BaseDatos {
    private $table = 'doctores';

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