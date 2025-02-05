<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../public/styles.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="../public/index.php" method="POST">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit" name="action" value="login">Iniciar Sesión</button>
        </form>
        <p>¿No tienes cuenta? <a href="#">Regístrate aquí</a>.</p>
    </div>
</body>
</html>