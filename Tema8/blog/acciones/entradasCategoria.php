<?php
session_start();
require_once '../requires/conexion.php';
require_once '../requires/funciones.php';


// Obtener el ID de la categoría desde la URL
$categoria_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Validar el ID de la categoría
if ($categoria_id <= 0) {
    die("Error: Categoría no válida.");
}

// Obtener las entradas de la categoría
$entradas = obtenerEntradasPorCategoria($db, $categoria_id);

// Obtener el nombre de la categoría
$sql = "SELECT nombre FROM categorias WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $categoria_id, PDO::PARAM_INT);
$stmt->execute();
$categoria = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$categoria) {
    die("Error: Categoría no encontrada.");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entradas de <?= htmlspecialchars($categoria['nombre']) ?></title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>

<body>
<?php require_once '../requires/header.php'; ?>
    <main>
        <?php if (!empty($entradas)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($entradas as $entrada): ?>
                        <tr>
                            <td><?= htmlspecialchars($entrada['titulo']) ?></td>
                            <td><?= htmlspecialchars(substr($entrada['descripcion'], 0, 100)) ?>...</td>
                            <td><?= htmlspecialchars($entrada['autor']) ?></td>
                            <td><?= htmlspecialchars($entrada['fecha']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay entradas disponibles en esta categoría.</p>
        <?php endif; ?>
    </main>
</body>

</html>