<?php
session_start();
require_once '../requires/conexion.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header('Location: ../requires/login.php');
    exit;
}

$usuario_id = $_SESSION['usuario']['id']; // ID del usuario logueado
$errores = [];

// Recoger y validar los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($nombre)) {
        $errores['nombre'] = 'El nombre es obligatorio.';
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'Introduce un correo electrónico válido.';
    }

    // Verificar que el email no está duplicado
    try {
        $sql = "SELECT id FROM usuarios WHERE email = :email AND id != :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $errores['email'] = 'El correo electrónico ya está en uso por otro usuario.';
        }
    } catch (PDOException $e) {
        $errores['general'] = 'Error al verificar el correo: ' . $e->getMessage();
    }

    if (empty($errores)) {
        try {
            // Construir la consulta de actualización
            $sql = "UPDATE usuarios SET nombre = :nombre, email = :email";

            if (!empty($password)) {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $sql .= ", password = :password";
            }

            $sql .= " WHERE id = :id";
            $stmt = $db->prepare($sql);

            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            if (!empty($password)) {
                $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
            }
            $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
            $stmt->execute();

            // Actualizar la sesión con los nuevos datos
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']['email'] = $email;

            echo "<script> 
                window.scrollTo(0, 0.2 * window.innerHeight);
                alert('Datos actualizados correctamente.'); 
                window.location.href = '../index.php';
            </script>";
        } catch (PDOException $e) {
            $errores['general'] = 'Error al actualizar los datos: ' . $e->getMessage();
        }
    }
}

// Mostrar errores si los hay
if (!empty($errores)) {
    foreach ($errores as $error) {
        echo "<p style='color: red;'>{$error}</p>";
    }
    echo '<a href="formularioUsuario.php">Volver</a>';
}
