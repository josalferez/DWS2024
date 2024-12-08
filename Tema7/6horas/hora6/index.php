<?php
session_name('idSesion');
session_start();

// Tiempo de inactividad (5 minutos)
if (isset($_SESSION['ultimo_acceso']) && (time() - $_SESSION['ultimo_acceso'] > 5 * 60)) {
    session_unset();
    session_destroy();
}
$_SESSION['ultimo_acceso'] = time();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($usuario === 'admin' && $password === '1234') {
        $_SESSION['usuario'] = $usuario;
        setcookie('bienvenida', $usuario, time() + 7 * 86400, '/');
        header("Location: bienvenida.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../../../Tema5/css/estilos.css">
</head>

<body>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="POST">
        <h1>Iniciar Sesión</h1>
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>

</html>