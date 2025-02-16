<?php

namespace app\models;

use config\Database;
use PDO;

class UserModel {
    private $db;

    public function __construct() {
       // Cambia los parámetros a los valores correctos según tu configuración
$this->db = (new Database('localhost', 'cita_app', 'root', ''))->connect();

    }

    public function register($username, $password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);
        return $stmt->execute();
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}