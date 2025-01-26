<?php
namespace Models;

use PDO;

class Cita {
    private $id;
    private $paciente_id;
    private $doctor_id;
    private $fecha;
    private $hora;

    // Conexión a la base de datos
    private $pdo;

    public function __construct() {
        // Incluimos el archivo de conexión
        require 'conexion.php';
        global $pdo; // Accedemos a la variable $pdo definida en conexion.php
        $this->pdo = $pdo;
    }

    // Método para obtener todas las citas
    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM citas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener una cita por su ID
    public function getById(int $id): array {
        $stmt = $this->pdo->prepare("SELECT * FROM citas WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para insertar una nueva cita
    public function insert(array $data): bool {
        $sql = "INSERT INTO citas (paciente_id, doctor_id, fecha, hora) VALUES (:paciente_id, :doctor_id, :fecha, :hora)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    // Método para actualizar una cita
    public function update(int $id, array $data): bool {
        $data['id'] = $id;
        $sql = "UPDATE citas SET paciente_id = :paciente_id, doctor_id = :doctor_id, fecha = :fecha, hora = :hora WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    // Método para eliminar una cita
    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM citas WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>