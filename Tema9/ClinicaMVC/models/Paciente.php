<?php
namespace Models;

use PDO;

class Paciente {
    private $id;
    private $nombre;
    private $apellidos;
    private $correo;
    private $password;

    // Conexión a la base de datos
    private $pdo;

    public function __construct() {
        // Incluimos el archivo de conexión
        require 'conexion.php';
        global $pdo; // Accedemos a la variable $pdo definida en conexion.php
        $this->pdo = $pdo;
    }

    // Método para obtener todos los pacientes
    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM pacientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un paciente por su ID
    public function getById(int $id): array {
        $stmt = $this->pdo->prepare("SELECT * FROM pacientes WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para insertar un nuevo paciente
    public function insert(array $data): bool {
        $sql = "INSERT INTO pacientes (nombre, apellidos, correo, password) VALUES (:nombre, :apellidos, :correo, :password)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    // Método para actualizar un paciente
    public function update(int $id, array $data): bool {
        $data['id'] = $id;
        $sql = "UPDATE pacientes SET nombre = :nombre, apellidos = :apellidos, correo = :correo, password = :password WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    // Método para eliminar un paciente
    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM pacientes WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>