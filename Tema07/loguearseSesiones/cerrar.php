<?php
session_start();

// Cerrar sesión
session_unset(); // Eliminar variables de sesión
session_destroy(); // Destruir la sesión

$mensaje = "Ha cerrado sesión correctamente.";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar Sesión</title>
</head>
<body>
    <h2><?php echo $mensaje; ?></h2>
    <a href="index.php">Volver al inicio</a>
</body>
</html>
