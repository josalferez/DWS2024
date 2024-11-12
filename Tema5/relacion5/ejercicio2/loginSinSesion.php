<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
    // Usuario y contraseña predeterminados. Modificado desde el IES
    $usuario_valido = "usuario";
    $password_valido = "1234";

    // Si el formulario no se ha enviado aún
    if (!isset($_POST['submit'])) {
        // 0. Mostrar el formulario de inicio de sesión
        ?>
        <form action="loginSinSesion.php" method="post">
            Usuario: <input type="text" name="usuario" placeholder="usuario" required autofocus><br>
            Contraseña: <input type="password" name="password" required><br>
            <input type="submit" name="submit" value="Iniciar sesión">
        </form>
        <?php
    } else {
        // Si el formulario ya se ha enviado, verificar las credenciales
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        if ($usuario === $usuario_valido && $password === $password_valido) {
            // Si las credenciales son correctas, redirigir a altaAlumno.php
            header("Location: ../ejercicio1/alumnoAlta.php");
            exit; // Terminar el script para asegurar que no se ejecuta más código
        } else {
            // Si las credenciales no son válidas, mostrar un mensaje de error y el formulario de nuevo
            ?>
            <p style="color:red;">Error: Usuario o contraseña incorrectos.</p>
            <form action="loginSinSesion.php" method="post">
                Usuario: <input type="text" name="usuario" placeholder="usuario" required autofocus><br>
                Contraseña: <input type="password" name="password" required><br>
                <!-- <input type="submit" name="submit" value="Iniciar sesión">-->
                <button> Iniciar Sesion</button>
            </form>
            <?php
        }
    }
    ?>
</body>
</html>
