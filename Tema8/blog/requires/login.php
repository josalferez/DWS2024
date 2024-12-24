<?php
// Nos aseguramos de que la sesión esté iniciada
session_start(); // Iniciar sesión

// Borrar errores antiguos
if (isset($_SESSION['error_login'])) {
    unset($_SESSION['error_login']);
}

// Conexión a la base de datos
require_once 'conexion.php';

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recoger los datos del formulario
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validar datos
    if (!empty($email) && !empty($password)) {
        // Comprobar credenciales del usuario
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            // Credenciales correctas, guardar datos en sesión
            $_SESSION['usuario'] = [
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'apellidos' => $usuario['apellidos'],
                'email' => $usuario['email']
            ];

            $_SESSION['loginExito'] = true;
            // Redirigir al index
            //echo "Usuario correcto";
            header("Location: ../index.php");
            exit();
        } else {
            // Credenciales incorrectas
            $_SESSION['error_login'] = 'Credenciales incorrectas.';
        }
    } else {
        // Campos vacíos
        $_SESSION['error_login'] = 'Por favor, complete todos los campos.';
    }
}

// Redirigir al index en caso de error
header("Location: ../index.php");
exit();
?>
