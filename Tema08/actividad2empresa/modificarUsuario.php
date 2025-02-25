    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="css/style.css"> <!-- Incluyendo el CSS -->
        <title>Modificar Usuario</title>
    </head>

    <body>
        <a href="bienvenida.php">Volver</a>
        <?php
        session_start();
        require_once 'config/config.php';
        require_once 'lib/conexion.php';

        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        if (isset($_POST['modificar'])) {
            // Obtengo el usuario de la base de datos con el email de la sesión
            // Este es el usuario que se va a modificar
            $email = $_SESSION['nombre'];
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'email' => $email
            ]);
            $usuario = $stmt->fetch();
            $id = $usuario['id'];
            $emailNuevo = $_POST['email'];

            $sql = "UPDATE usuarios SET email = :emailNuevo WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'emailNuevo' => $emailNuevo,
                'id' => $id
            ]);
            $_SESSION['nombre'] = $emailNuevo;
            echo "Usuario modificado correctamente.";
            header("Location: bienvenida.php");
            exit();
        } else {
        ?>
            <form method="post" action="modificarUsuario.php">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $_SESSION['nombre'] ?>"><br>
                <input type="submit" name="modificar" value="Modificar">
            </form>
        <?php
        }
        ?>

    </body>

    </html>