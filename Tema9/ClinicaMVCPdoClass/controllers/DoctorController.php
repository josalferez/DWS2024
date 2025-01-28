<?php
// controllers/DoctorController.php

namespace Controllers;

use Models\Doctor;

class DoctorController {
    private $doctor;

    public function __construct() {
        $this->doctor = new Doctor();
    }

    public function mostrarTodos() {
        $todos_mis_doctores = $this->doctor->getAll();
        require_once __DIR__ . '/../views/doctor/mostrar_todos.php';
    }
}