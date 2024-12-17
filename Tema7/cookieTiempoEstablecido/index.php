<?php
// Verifica si se envía el formulario para crear la cookie
if (isset($_POST['crear_cookie']) && !empty($_POST['nombre_usuario']) && !empty($_POST['duracion_cookie'])) {
    $nombre_usuario = htmlspecialchars($_POST['nombre_usuario']);
    $duracion_cookie = intval($_POST['duracion_cookie']);
    if ($duracion_cookie >= 1 && $duracion_cookie <= 60) {
        setcookie('usuario', $nombre_usuario, time() + $duracion_cookie);
    }
    header("Location: ".$_SERVER['PHP_SELF']); // Redirige para evitar reenvío de formulario
    exit();
}

// Verifica si se envía el formulario para borrar la cookie
if (isset($_POST['borrar_cookie'])) {
    setcookie('usuario', '', time() - 3600); // Expira la cookie
    header("Location: ".$_SERVER['PHP_SELF']); // Redirige para evitar reenvío de formulario
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación y Destrucción de Cookies</title>
</head>
<body>
    <h1 style="font-family: Arial, sans-serif; font-size: 2em;">CREACION Y DESTRUCCION COOKIE</h1>

    <form method="POST" action="">
        <label for="nombre_usuario">Nombre de usuario:</label>
        <input type="text" name="nombre_usuario" id="nombre_usuario" value=""><br><br>

        <label for="duracion_cookie">Duración cookie (entre 1 y 60 segundos):</label>
        <input type="number" name="duracion_cookie" id="duracion_cookie" value="10" min="1" max="60"><br><br>

        <input type="submit" name="crear_cookie" value="Crear cookie">
        <input type="submit" name="borrar_cookie" value="Borrar cookie">
        <input type="submit" name="actualizar" value="Actualizar página">
    </form>

    <hr>

    <?php
    // Muestra mensajes dependiendo de la cookie
    if (isset($_COOKIE['usuario'])) {
        echo "Hola, <strong>" . htmlspecialchars($_COOKIE['usuario']) . "</strong>. Bienvenido a nuestra página web.<br>";
        echo "La cookie <strong>usuario</strong> tiene el valor <strong>" . htmlspecialchars($_COOKIE['usuario']) . "</strong>.";
    } else {
        echo "¡No hay ninguna cookie almacenada!";
    }
    ?>
</body>
</html>
