<?php

// 1. Inciamos sesión
session_start();

// 7. Definimos una variable de sesión para controlar los 3 intentos fallidos de inicio de sesión
$_SESSION['errorInicioSesion'] = $_SESSION['errorInicioSesion'] ?? 0;
$_SESSION['ultimoIntento'] = $_SESSION['ultimoIntento'] ?? time();

// 2. Incluyo los datos de conexion a la base de datos y la creo
require_once "config/config.php";
require_once "lib/conexion.php";

$conexion = new Conexion();
$pdo = $conexion->getPdo();

// 4. Si se ha enviado el formulario de registro 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registro'])) {
    // Comprobamos que el email es válido
    $email = filter_var(trim($_POST['email_registro']), FILTER_VALIDATE_EMAIL);
    // Comprobamos que la contraeña es válida
    $password = trim($_POST['password_registro']);

    if ($email && $password) {
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email=:email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Si no existe el email en la base de datos lo añado
        if ($stmt->rowCount() == 0) {
            $password_hash = password_hash($password, PASSWORD_BCRYPT); // Codifico la contraseña en la base de datos
            $stmt = $pdo->prepare("INSERT INTO usuarios (email, password_hash) VALUES (:email, :password_hash)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password_hash', $password_hash);
            $stmt->execute();
            $_SESSION['success_message'] = "Registro realizado con éxito";
            header("Location: index.php");
            exit();
        } else {
            echo "El email ya existe";
        }
    } else {
        echo "Por favor, rellena todos los campos del formulario de registro";
    }
}

// 6. Formulario de Inicio de Sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) && $_SESSION['errorInicioSesion'] < 3) {
    // Comprobamos que el email es válido
    $email = filter_var(trim($_POST['email_login']), FILTER_VALIDATE_EMAIL);
    // Comprobamos que la contraeña es válida
    $password = trim($_POST['password_login']);

    if ($email && $password) {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            if (password_verify($password, $user['password_hash'])) {
                $_SESSION['email'] = $email;
                $_SESSION['nombre'] = $user['Nombre'];
                $_SESSION['errorInicioSesion'] = 0;
                $_SESSION['rol'] = $user['rol'];
                header("Location: bienvenida.php");
                exit();
            } else {
                echo "La contraseña no es correcta.";
                $_SESSION['errorInicioSesion']++;
                $_SESSION['ultimoIntento'] = time(); // Guardo la hora del ultimo intento fallido

            }
        } else {
            echo "El email no existe en nuestra Base de Datos";
        }
    }
}

// 7. Controlamos los 3 intentos fallidos de inicio de sesión
echo "Error inicio sesion" . var_dump($_SESSION['errorInicioSesion']);
echo "ultimo intento: " . var_dump($_SESSION['ultimoIntento']);
if ($_SESSION['errorInicioSesion'] >= 3) {
    $tiempoRestante = time() - $_SESSION['ultimoIntento'];
    if ($tiempoRestante < 5) {
        // Bloqueo al usuario durante 5 segundos
        echo "<script> 
        setTimeout(function() {
            window.location.reload();
        }, 5000);
        </script>";
    } else {
        // Hacemos un reset de los errores si han pasado más de 5 segundos
        $_SESSION['errorInicioSesion'] = 0;
    }
}

// 3. Formulario de Registro
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro y Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form method="POST">
        Email: <input type="email" name="email_registro" required>
        Contraseña: <input type="password" name="password_registro" required>
        <input type="submit" name="registro" value="Registra">
    </form>

    <?php if ($_SESSION['errorInicioSesion'] < 3) { ?>
        <!-- 5. Formulario de Login -->
        <form method="POST">
            Email: <input type="email" name="email_login" required>
            Contraseña: <input type="password" name="password_login" required>
            <input type="submit" name="login" value="Login">
        </form>
    <?php } else { ?>
        <h2> Has introducido mal el login 3 veces. Por favor, espera 5 segundos. </h2>
    <?php } ?>
</body>
</html>