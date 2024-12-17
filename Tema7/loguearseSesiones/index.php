<?php
// Iniciar sesión
session_start();

// Credenciales válidas
$usuario_correcto = "admin";
$contrasena_correcta = "1234";

// Verificar si el formulario fue enviado
$mensaje_error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Verificar usuario y contraseña
    if ($usuario === $usuario_correcto && $contrasena === $contrasena_correcta) {
        // Guardar usuario en la sesión
        $_SESSION['usuario'] = $usuario;
        header("Location: protegida.php");
        exit();
    } else {
        $mensaje_error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <?php if ($mensaje_error): ?>
        <p style="color: red;"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>
    <form method="POST" action="index.php">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required><br><br>
        
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required><br><br>
        
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
