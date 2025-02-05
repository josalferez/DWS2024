<?php

namespace app\models;

use config\Database;
use PDO;


class AppointmentModel {
    private $db;

    public function __construct() {
        // Cambia los parámetros a los valores correctos según tu configuración
$this->db = (new Database('localhost', 'cita_app', 'root', ''))->connect();

    }

    public function createAppointment($user_id, $date, $time) {
        $stmt = $this->db->prepare("INSERT INTO appointments (user_id, date, time) VALUES (:user_id, :date, :time)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        return $stmt->execute();
    }

    public function getAppointmentsByUser($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM appointments WHERE user_id = :user_id ORDER BY date ASC, time ASC");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}