<?php
session_start();

// Inicializar el valor de la sesión si no existe
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0; // Valor inicial
}

// Comprobar si el parámetro 'accion' está presente en la URL
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    // Aumentar o disminuir el valor según el parámetro recibido
    if ($accion == "1") {
        $_SESSION['contador']++;
    } elseif ($accion == "0") {
        $_SESSION['contador']--;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador con Sesiones</title>
</head>
<body>
    <h2>Contador con Sesiones</h2>
    <p>El valor actual del contador es: <strong><?php echo $_SESSION['contador']; ?></strong></p>
    
    <!-- Enlaces para enviar parámetros GET -->
    <a href="contador.php?accion=1">Aumentar (+1)</a><br>
    <a href="contador.php?accion=0">Disminuir (-1)</a><br>

    <!-- Botón para reiniciar la sesión (y el contador) -->
    <form action="contador.php" method="POST">
        <button type="submit" name="reiniciar">Reiniciar Contador</button>
    </form>

    <?php
    // Si se pulsa el botón de reiniciar, reiniciar el contador
    if (isset($_POST['reiniciar'])) {
        $_SESSION['contador'] = 0;
        header("Location: contador.php"); // Redirigir para evitar reenvío del formulario
        exit();
    }
    ?>
</body>
</html>
