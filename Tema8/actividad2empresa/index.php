<?php
// Incluir configuración y conexión
require_once 'config/config.php';
require_once 'lib/conexion.php';

$conexion = new Conexion();
$pdo = $conexion->getPdo();

// Formulario de Registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $email = filter_var(trim($_POST['email_register']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password_register']);

    if ($email && $password) {
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("INSERT INTO usuarios (email, password_hash) VALUES (:email, :password_hash)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password_hash', $password_hash);
            $stmt->execute();
            echo "Registro exitoso!";
        } else {
            echo "El email ya está registrado.";
        }
    } else {
        echo "Por favor completa todos los campos de registro.";
    }
}

// Formulario de Inicio de Sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = filter_var(trim($_POST['email_login']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password_login']);

    if ($email && $password) {
        $stmt = $pdo->prepare("SELECT password_hash FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            if (password_verify($password, $user['password_hash'])) {
                echo "Inicio de sesión exitoso!";
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Email no registrado.";
        }
    } else {
        echo "Por favor completa todos los campos de inicio de sesión.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro e Inicio de Sesión</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Incluyendo el CSS -->
</head>
<body>

<h2>Registro</h2>
<form method="post">
    Email: <input type="email" name="email_register" required>
    Contraseña: <input type="password" name="password_register" required>
    <input type="submit" name="register" value="Registrar">
</form>

<h2>Iniciar Sesión</h2>
<form method="post">
    Email: <input type="email" name="email_login" required>
    Contraseña: <input type="password" name="password_login" required>
    <input type="submit" name="login" value="Iniciar Sesión">
</form>

</body>
</html>