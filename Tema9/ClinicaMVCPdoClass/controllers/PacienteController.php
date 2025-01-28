<?php
// controllers/PacienteController.php

namespace Controllers;

use Models\Paciente;

class PacienteController {
    private $paciente;

    public function __construct() {
        $this->paciente = new Paciente();
    }

    public function mostrarTodos() {
        $todos_mis_pacientes = $this->paciente->getAll();
        require_once __DIR__ . '/../views/paciente/mostrar_todos.php';
    }
}