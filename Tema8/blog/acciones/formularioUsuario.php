<?php
session_start();
require_once '../requires/conexion.php';


// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login.php');
    exit;
}

$usuario = $_SESSION['usuario']; // Datos del usuario logueado

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar Perfil</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require_once '../requires/header.php'; ?>
    <h2>Actualizar Datos del Usuario</h2>
    <form action="actualizarUsuario.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>

        <label for="password">Nueva Contraseña (opcional):</label>
        <input type="password" name="password" id="password">

        <button type="submit">Guardar Cambios</button>
    </form>
</body>

</html>