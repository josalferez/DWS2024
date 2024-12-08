<?php
session_name('idSesion');
session_start();

if (!isset($_SESSION['usuario']) && isset($_COOKIE['bienvenida'])) {
    $mensaje = "¡Hola de nuevo, " . htmlspecialchars($_COOKIE['bienvenida']) . "!";
} elseif (isset($_SESSION['usuario'])) {
    $mensaje = "Bienvenido, " . htmlspecialchars($_SESSION['usuario']) . "!";
} else {
    header("Location: index.php");
    exit;
}
var_dump($_SESSION);
echo "<br>";
var_dump($_COOKIE);
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
