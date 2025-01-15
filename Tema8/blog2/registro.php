<?php

session_start();

require_once 'requires/conexion.php';

// 4. Si se ha enviado el formulario de registro 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registro'])) {
    // Comprobamos que el email es válido
    $email = filter_var(trim($_POST['emailRegistro']), FILTER_VALIDATE_EMAIL);
    // Comprobamos que la contraeña es válida
    $password = trim($_POST['passwordRegistro']);

    // Compruebo si el email y el password ya están en la tabla
    if ($email && $password) {
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email=:email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Si no existe el email en la base de datos lo añado
        if ($stmt->rowCount() == 0) {
            $password_hash = password_hash($password, PASSWORD_BCRYPT); // Codifico la contraseña en la base de datos
            $nombre = $_POST['nombreRegistro'];
            $apellidos = $_POST['apellidosRegistro'];
            $fecha = date("Y-m-d");
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, apellidos, email, password, fecha) 
                                   VALUES (:nombre, :apellidos, :email, :password_hash, :fecha)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellidos', $apellidos);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password_hash', $password_hash);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->execute();
            $_SESSION['success_message'] = "Registro realizado con éxito";
            header("Location: index.php");
            exit();
        } else {
            echo "El email ya existe";
        }
    } else {
        echo "Por favor, rellena todos los campos del formulario de registro";
    }
}