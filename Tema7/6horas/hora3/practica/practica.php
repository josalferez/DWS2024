<?php

/**
 * Crear un script que permita:
 * Autenticar al usuario con un formulario.
 * Regenerar el ID de sesión después de la autenticación.
 * Mostrar un mensaje de bienvenida al usuario.
 * Destruir la sesión después de 5 minutos de inactividad.
 * Implementar un cierre de sesión manual que elimine todas las variables de sesión y la cookie. 
 */


session_start();

// Tiempo de inactividad en segundos (5 minutos)
$tiempo_inactividad = 5 * 60; 

// Verificar si hay actividad reciente
if (isset($_SESSION['ultimoAcceso']) && (time() - $_SESSION['ultimoAcceso'] > $tiempo_inactividad)) {
    // Si han pasado más de 5 minutos, destruir la sesión
    session_unset();
    session_destroy();
    header("Location: practica.php"); // Redirigir al formulario de login
    exit;
}

// muestro el id de sesión
echo session_id() . "<br>";

// Actualizar la hora de último acceso
$_SESSION['ultimoAcceso'] = time();

// Validación del formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validación de usuario (esto es solo un ejemplo, en un caso real se debe validar con una base de datos)
    if ($usuario === 'admin' && $password === '1234') {
        // Regenerar el ID de sesión para mayor seguridad
        session_regenerate_id(true);
        echo "<br> El nuevo identificador de sesión es: " . session_id();

        // Guardar el nombre de usuario en la sesión
        $_SESSION['usuario'] = $usuario;

        // Establecer una cookie para recordar al usuario (opcional)
        setcookie('usuario', $usuario, time() + 60 * 60 * 24, '/'); // La cookie expirará en 1 día

        // Redirigir a la página principal
        header("Location: practica.php");
        exit;
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}

// Cerrar sesión manual
if (isset($_GET['logout'])) {
    session_unset(); // Eliminar todas las variables de sesión
    session_destroy(); // Destruir la sesión
    setcookie('usuario', '', time() - 1, '/'); // Eliminar la cookie
    header("Location: practica.php"); // Redirigir al formulario de login
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../../Tema5/css/estilos.css">
    <title>Login</title>
</head>

<body>
    <?php if (isset($_SESSION['usuario'])){ ?>
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
        <p><a href="?logout=true">Cerrar sesión</a></p>
    <?php }else{ ?>
        <form method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button>Iniciar sesión</button>
        </form>
    <?php } ?>
</body>

</html>