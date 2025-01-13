<?php

// Inicio sesión
session_start();

$_SESSION['errorInicioSesion'] = $_SESSION['errorInicioSesion'] ?? 0; // Guardo el error de inicio de sesión
$_SESSION['ultimoIntento'] = $_SESSION['ultimoIntento'] ?? time(); // Guarda el tiempo del último intento

// Incluir configuración y conexión
require_once 'config/config.php';
require_once 'lib/conexion.php';

$conexion = new Conexion();
$pdo = $conexion->getPdo();

// Formulario de Registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Compruebo que el email es válido
    $email = filter_var(trim($_POST['email_register']), FILTER_VALIDATE_EMAIL);
    // Quito los espacios en blanco al comienzo y final de la contraseña
    $password = trim($_POST['password_register']);

    if ($email && $password) {
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Si no existe el email en la base de datos, se registra
        if ($stmt->rowCount() == 0) {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            // INSERT INTO tabla (columna1, columna2, ...) VALUES (valor1, valor2, ...);
            $stmt = $pdo->prepare("INSERT INTO usuarios (email, password_hash) VALUES (:email, :password_hash)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password_hash', $password_hash);
            $stmt->execute();
            echo "Registro exitoso!";
        } else {
            echo "El email ya está registrado.";
        }
    } else {
        echo "Por favor completa todos los campos de registro.";
    }
}

// Formulario de Inicio de Sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login']) && $_SESSION['errorInicioSesion'] < 3) {
    $email = filter_var(trim($_POST['email_login']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password_login']);

    if ($email && $password) {
        //$stmt = $pdo->prepare("SELECT password_hash FROM usuarios WHERE email = :email");
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            if (password_verify($password, $user['password_hash'])) {
                $_SESSION['errorInicioSesion'] = 0;
                $_SESSION['rol'] = $user['rol'];
                $_SESSION['nombre'] = $user['email'];
                header("Location: bienvenida.php");
                exit();
            } else {
                $_SESSION['errorInicioSesion']++;
                $_SESSION['ultimoIntento'] = time(); // Registro la hora del último intento fallido
            }
        } else {
            echo "Email no registrado.";
        }
    } else {
        echo "Por favor completa todos los campos de inicio de sesión.";
    }
}

// Si se superan los 3 intentos, bloqueamos por 5 segundos
if ($_SESSION['errorInicioSesion'] >= 3) {
    $tiempoRestante = time() - $_SESSION['ultimoIntento'];
    if ($tiempoRestante < 5) {
        // Bloquear al usuario durante 5 segundos
        echo "<script>
            setTimeout(function() {
                window.location.reload();
            }, 5000);
        </script>";
    } else {
        // Si ya han pasado los 5 segundos, reseteamos los errores
        $_SESSION['errorInicioSesion'] = 0;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro e Inicio de Sesión</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Incluyendo el CSS -->
</head>
<body>

<h2>Registro</h2>
<form method="post">
    Email: <input type="email" name="email_register" required>
    Contraseña: <input type="password" name="password_register" required>
    <input type="submit" name="register" value="Registrar">
</form>

<?php if ($_SESSION['errorInicioSesion'] < 3) {?>
<h2>Iniciar Sesión</h2> 
<form method="post">
    Email: <input type="email" name="email_login" required>
    Contraseña: <input type="password" name="password_login" required>
    <input type="submit" name="login" value="Iniciar Sesión">
</form>
<?php } else { ?>
    <h2>Has superado el número de intentos permitidos. Por favor, espera 5 segundos.</h2>
<?php } ?>
</body>
</html>
