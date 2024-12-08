<?php

/**
 * Crear un sistema con las siguientes características:
 * Formulario de inicio de sesión con campos para usuario y contraseña.
 * Si el usuario inicia sesión correctamente:
 * Guardar su ID en una sesión.
 * Establecer una cookie de bienvenida que persista durante 7 días. 
 * Si la sesión o la cookie existen, mostrar un mensaje de bienvenida.
 * Implementar un botón para cerrar sesión, eliminando la sesión.
**/

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validación básica
    if ($usuario === 'admin' && $password === '1234') {
        // Guardar en sesión
        $_SESSION['usuario'] = $usuario;

        // Establecer cookie
        setcookie('bienvenida', $usuario, time() + 7 * 86400);

        header("Location: practica.php");
        exit;
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}

// Cerrar sesión
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    setcookie('bienvenida', '', time() - 3600);
    header("Location: practica.php");
    exit;
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Autenticación con PHP</title>
    <link rel="stylesheet" href="../../../Tema5/css/estilos.css">
</head>
<body>
    <?php if (isset($_SESSION['usuario'])){ ?>
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
        <a href="?logout=true">Cerrar sesión</a>
    <?php }else{ ?>
        <form method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Iniciar sesión</button>
        </form>
    <?php } ?>
</body>
</html>
