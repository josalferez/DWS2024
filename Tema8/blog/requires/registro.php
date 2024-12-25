<?php
// Iniciar sesión
session_start();

// Incluir la conexión a la base de datos
require_once 'conexion.php';

// Variables para errores o mensajes
$errores = [];
$mensaje = "";

// Comprobar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger los valores del formulario
    $_SESSION['nombre'] = $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $_SESSION['apellidos'] = $apellidos = isset($_POST['apellidos']) ? trim($_POST['apellidos']) : '';
    $_SESSION['email'] = $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validar los datos
    if (empty($nombre)) {
        $errores['nombre'] = "El nombre es obligatorio.";
    }
    if (empty($apellidos)) {
        $errores['apellidos'] = "Los apellidos son obligatorios.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = "El email no es válido.";
    }
    if (empty($password) || strlen($password) < 6) {
        $errores['password'] = "La contraseña debe tener al menos 6 caracteres.";
    }

    // Si no hay errores, insertar el usuario
    if (empty($errores)) {
        try {
            // Encriptar la contraseña
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);

            // Preparar la consulta SQL
            $sql = "INSERT INTO usuarios (nombre, apellidos, email, password, fecha) 
                    VALUES (:nombre, :apellidos, :email, :password, NOW())";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellidos', $apellidos);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $passwordHash);

            // Ejecutar la consulta
            $stmt->execute();

            // Mensaje de éxito
            $mensaje = "Usuario añadido con éxito.";
        } catch (PDOException $e) {
            $errores['general'] = "Error al registrar el usuario: " . $e->getMessage();
        }
    // Y destruimos la sesión para que el formulario vuelva a aparecer vacío
    session_destroy();
    }
}

// Mostrar mensaje de éxito o errores
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <script>
        // Redirigir después de 3 segundos
        setTimeout(() => {
            window.location.href = '../index.php';
        }, 3000);
    </script>
</head>
<body>
    <?php if (!empty($mensaje)): ?>
        <div class="mensaje"><?= $mensaje ?></div>
    <?php elseif (!empty($errores)): ?>
        <div class="errores">
            <?php foreach ($errores as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</body>
</html>
