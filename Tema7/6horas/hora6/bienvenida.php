<?php
session_name('idSesion');
session_start(); // Me aseguro que la sesiónestá activa

if (!isset($_SESSION['usuario']) && isset($_COOKIE['bienvenida'])) {
    echo "hola mundo";
    $mensaje = "¡Hola de nuevo, " . htmlspecialchars($_COOKIE['bienvenida']) . "!";
} elseif (isset($_SESSION['usuario'])) {
    $mensaje = "Bienvenido, " . htmlspecialchars($_SESSION['usuario']) . "!";
} else {
    header("Location: index.php");
    exit;
}
echo "<br>";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
</head>
<body>
    <h1><?php echo $mensaje; ?></h1>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
