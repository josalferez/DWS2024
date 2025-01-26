<?php
namespace Models;

use PDO;

class Doctor {
    private $id;
    private $nombre;
    private $apellidos;
    private $telefono;
    private $especialidad;

    // Conexión a la base de datos
    private $pdo;

    public function __construct() {
        // Incluimos el archivo de conexión
        require 'conexion.php';
        global $pdo; // Accedemos a la variable $pdo definida en conexion.php
        $this->pdo = $pdo;
    }

    // Método para obtener todos los doctores
    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM doctores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un doctor por su ID
    public function getById(int $id): array {
        $stmt = $this->pdo->prepare("SELECT * FROM doctores WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para insertar un nuevo doctor
    public function insert(array $data): bool {
        $sql = "INSERT INTO doctores (nombre, apellidos, telefono, especialidad) VALUES (:nombre, :apellidos, :telefono, :especialidad)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    // Método para actualizar un doctor
    public function update(int $id, array $data): bool {
        $data['id'] = $id;
        $sql = "UPDATE doctores SET nombre = :nombre, apellidos = :apellidos, telefono = :telefono, especialidad = :especialidad WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    // Método para eliminar un doctor
    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM doctores WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>