<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Obtener nombre del usuario
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Protegida</title>
</head>
<body>
    <h2>Página Protegida</h2>
    <p>Ha iniciado sesión como <strong><?php echo htmlspecialchars($usuario); ?></strong></p>

    <form action="cerrar.php" method="POST">
        <button type="submit">Cerrar Sesión</button>
    </form>
</body>
</html>
