<?php
require_once '../config/config.php';
require_once '../lib/conexion.php';

$conexion = new Conexion();
$pdo = $conexion->getPdo();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);

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
        echo "Por favor completa todos los campos.";
    }
}
?>

<form method="post">
    Email: <input type="email" name="email" required>
    Contraseña: <input type="password" name="password" required>
    <input type="submit" value="Registrar">
</form>