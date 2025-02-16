<?php
// Iniciar la sesión
session_start();

// Verificar si la variable de sesión existe
if (!isset($_SESSION['contador_visitas'])) {
    $_SESSION['contador_visitas'] = 1; // Primera visita
} else {
    $_SESSION['contador_visitas']++; // Incrementar contador
}

// Verificar si se solicita reiniciar la sesión
if (isset($_POST['reiniciar'])) {
    session_destroy(); // Eliminar la sesión
    header("Location: " . $_SERVER['PHP_SELF']); // Redirigir para limpiar datos
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Visitas con Sesiones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
            background-color: #f4f4f4;
        }
        h1 {
            font-size: 2.5em;
            color: #333;
        }
        .counter {
            font-size: 1.5em;
            margin: 20px auto;
            padding: 20px;
            background-color: #007bff;
            color: white;
            width: 50%;
            border-radius: 10px;
        }
        button {
            padding: 10px 20px;
            font-size: 1em;
            margin: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Contador de Visitas Usando Sesiones</h1>

    <div class="counter">
        <?php
        echo "Ha visitado esta página <strong>" . $_SESSION['contador_visitas'] . "</strong> veces.";
        ?>
    </div>

    <form method="POST">
        <button type="submit" name="reiniciar">Reiniciar Contador</button>
    </form>
</body>
</html>
