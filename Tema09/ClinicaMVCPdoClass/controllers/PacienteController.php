<?php
// controllers/PacienteController.php

namespace Controllers;

use Models\Paciente;

class PacienteController {
    private $paciente;

    public function __construct() {
        $this->paciente = new Paciente();
    }

    // Método para mostrar el formulario de registro
    public function mostrarFormularioRegistro() {
        require_once __DIR__ . '/../views/Paciente/registro.php';
    }

    // Método para guardar un nuevo paciente
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];

            // Guardar el paciente en la base de datos
            $this->paciente->guardar($nombre, $email, $telefono);

            // Redirigir a la lista de pacientes después de guardar
            header('Location: /paciente/mostrarTodos');
            exit();
        }
    }

    // Método para mostrar todos los pacientes
    public function mostrarTodos() {
        $todos_mis_pacientes = $this->paciente->getAll();
        require_once __DIR__ . '/../views/paciente/mostrar_todos.php';
    }
}