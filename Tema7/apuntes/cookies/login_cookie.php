<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Iniciar sesión guardando la cookie
    $usuario = $_POST['usuario'] ?? '';
    setcookie("usuario_login", $usuario, time() + 7 * 86400); // 7 días
    header("Location: login_cookie.php"); // Redirigir para evitar reenvío del formulario
    exit;
}

// Cerrar sesión eliminando la cookie
if (isset($_GET['logout'])) {
    setcookie("usuario_login", "", time() - 3600); // Expira en el pasado
    header("Location: login_cookie.php");
    exit;
}

//Comrpuebo si mi servidor contiene https
if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' ){
    echo "HTTPS no disponible!";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión con Cookies</title>
</head>
<body>
    <?php if (isset($_COOKIE['usuario_login'])): ?>
        <h1>Bienvenido de nuevo, <?php echo htmlspecialchars($_COOKIE['usuario_login']); ?>!</h1>
        <a href="?logout=true">Cerrar sesión</a>
    <?php else: ?>
        <form method="POST" action="">
            <label for="usuario">Nombre de usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <button type="submit">Iniciar sesión</button>
        </form>
    <?php endif; ?>
</body>
</html>

