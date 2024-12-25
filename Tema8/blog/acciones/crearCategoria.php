<?php
require_once '../requires/conexion.php';
//require_once 'requires/funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = [];
    $nombre = trim($_POST['nombre'] ?? '');

    // Validar el nombre
    if (empty($nombre)) {
        $errores['nombre'] = 'El nombre de la categoría es obligatorio.';
    } elseif (strlen($nombre) > 50) {
        $errores['nombre'] = 'El nombre de la categoría no puede exceder los 50 caracteres.';
    }

    // Si no hay errores, insertar en la base de datos
    if (empty($errores)) {
        try {
            $sql = "INSERT INTO categorias (nombre) VALUES (:nombre)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->execute();

            // Mostramos un mensaje de exito que dure 2 segundos, que se cierre solo y redirijimos a index.php
            echo '<div class="mensaje-exito">Categoría creada con éxito</div>';
            header("refresh:2;url=../index.php");
            exit;
        } catch (PDOException $e) {
            $errores['general'] = 'Error al crear la categoría: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Categoría</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Crear Categoría</h1>
        <form action="crearCategoria.php" method="POST">
            <label for="nombre">Nombre de la categoría:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ej. Tecnología" value="<?= htmlspecialchars($nombre ?? '') ?>">
            <?php if (!empty($errores['nombre'])): ?>
                <p class="error"><?= htmlspecialchars($errores['nombre']) ?></p>
            <?php endif; ?>

            <button type="submit">Guardar</button>
        </form>

        <?php if (!empty($errores['general'])): ?>
            <p class="error"><?= htmlspecialchars($errores['general']) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>

