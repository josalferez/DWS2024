<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Alumno</title>
</head>
<body>
    <h1>Información del Alumno Añadido</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 1. Capturamos los datos enviados desde el formulario
        $nombre = $_POST['nombre'] ?? '';
        $apellidos = $_POST['apellidos'] ?? '';
        $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $lenguajes = $_POST['lenguajes'] ?? [];
        $sabe_web = $_POST['sabe_web'] ?? '';
        $comentarios = $_POST['comentarios'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';
        $repite_contrasena = $_POST['repite_contrasena'] ?? '';

        // 2. Mostrar la información
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>Apellidos:</strong> $apellidos</p>";
        echo "<p><strong>Fecha de Nacimiento:</strong> $fecha_nacimiento</p>";
        echo "<p><strong>Correo Electrónico:</strong> $correo</p>";
        echo "<p><strong>Lenguajes de Programación Conocidos:</strong> " . implode(', ', $lenguajes) . "</p>";
        echo "<p><strong>¿Sabe crear páginas web estáticas?:</strong> $sabe_web</p>";
        echo "<p><strong>Comentarios:</strong> $comentarios</p>";

        // 3. Validamos las contraseñas
        if ($contrasena === $repite_contrasena) {
            echo "<p><strong>Contraseña:</strong> La contraseña coincide.</p>";
        } else {
            echo "<p><strong>Contraseña:</strong> La contraseña no coincide.</p>";
        }
    } else {
        echo "<p>No se ha enviado ningún dato.</p>";
    }
    ?>
    
    <br>
    <a href="alumnoAlta.php">Volver al formulario de alta</a>
</body>
</html>
