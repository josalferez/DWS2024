<?php
require_once '../config/config.php';
require_once '../lib/conexion.php';

$conexion = new Conexion();
$pdo = $conexion->getPdo();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);

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
        echo "Por favor completa todos los campos.";
    }
}
?>

<form method="post">
    Email: <input type="email" name="email" required>
    Contraseña: <input type="password" name="password" required>
    <input type="submit" value="Iniciar Sesión">
</form>