<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!-- Esto es un estilo para la alerta personalizada -->
    <div id="customAlert" style="display:none;">
        <div style="background-color:white; border:1px solid black; padding:20px; width:300px; position:fixed; left:50%; top:50%; transform:translate(-50%, -50%); z-index:1000;">
            <p id="alertMessage"></p>
            <button onclick="closeAlert()">Cerrar</button>
        </div>
    </div>

    <script>
        function showCustomAlert(message) {
            document.getElementById('alertMessage').innerText = message;
            document.getElementById('customAlert').style.display = 'block';
        }

        function closeAlert() {
            document.getElementById('customAlert').style.display = 'none';
            window.location.href = "bienvenida.php"; // Redirigir después de cerrar la alerta
        }
    </script>

    <style>
        #customAlert {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Fondo oscuro semi-transparente */
            z-index: 999;
            /* Asegúrate de que esté por encima de otros elementos */
        }
    </style>


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
        echo '<td><form method="post" action="eliminarUsuario.php"><input type="hidden" name="id" value="' . $usuario['id'] . '"><input type="submit" name="eliminar" value="Eliminar"></form></td>';
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
        $stmt->execute([
            'id' => $id
        ]);
        echo '<script>
                showCustomAlert("El usuario ha sido borrado correctamente.");          
                </script>';
        exit();
    }
    ?>


</body>

</html>