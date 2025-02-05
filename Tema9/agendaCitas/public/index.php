<?php

// Definir la raíz del proyecto
define('ROOT', dirname(__DIR__));

// Iniciar sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Cargar el autoloader personalizado
require_once ROOT . '/app/autoload.php';


// Usar los controladores con namespaces
use app\controllers\AuthController;
use app\controllers\AppointmentController;

$authController = new AuthController();
$appointmentController = new AppointmentController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'login') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($authController->login($username, $password)) {
                header('Location: dashboard.php');
                exit;
            } else {
                echo "Credenciales incorrectas.";
            }
        } elseif ($action === 'create_appointment' && $authController->isLoggedIn()) {
            $date = $_POST['date'];
            $time = $_POST['time'];
            $userId = $_SESSION['user_id'];
            if ($appointmentController->createAppointment($userId, $date, $time)) {
                header('Location: dashboard.php');
                exit;
            } else {
                echo "Error al crear la cita.";
            }
        }
    }
}

if ($authController->isLoggedIn()) {
    header('Location: dashboard.php');
    exit;
} else {
    include '../app/views/login.php';
}