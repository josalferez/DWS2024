<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <title>Eliminar Usuarios </title>
        <link rel="stylesheet" href="css/style.css"> <!-- Incluyendo el CSS -->
    </head>
</head>

<body>
    <a href="index.php">Volver</a>

    <?php
    // Consulto todos los usuarios de la base de datos
    // los muestro en una tabla y añado junto a cada uno de ellos
    // un botón para eliminarlos
    session_start();

    require_once 'config/config.php';
    require_once 'lib/conexion.php';

    $conexion = new Conexion();
    $pdo = $conexion->getPdo();
    $sql = "SELECT * FROM usuarios";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $usuarios = $stmt->fetchAll();

    echo '<table>';
    echo '<tr>';
    echo '<th>Id</th>';
    echo '<th>Email</th>';
    echo '<th>Eliminar</th>';
    echo '</tr>';
    foreach ($usuarios as $usuario) {
        echo '<tr>';
        echo '<td>' . $usuario['id'] . '</td>';
        echo '<td>' . $usuario['email'] . '</td>';
        echo '<td><form method="post" action="eliminarUsuario.php">
                            <input type="hidden" name="id" value="' . $usuario['id'] . '">
                            <input type="submit" name="eliminar" value="Eliminar">
                        </form></td>';
        echo '</tr>';
    }
    echo '</table>';

    // Si se ha eliminado el usuario, muestro una alerta con el mensaje
    // El usuario ha sido borrado correctamente
    // Cierro esa alerta a los 5 segundos y redirijo a la página de bienvenida
    if (isset($_POST['eliminar'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        echo "El usuario ha sido borrado correctamente.";
        echo "<script>setTimeout(function() { window.location.href = 'bienvenida.php'; }, 2000);
            </script>";
    }
    ?>


</body>

</html>