<?php
session_start();
require_once '../requires/conexion.php';


// Consultar todas las entradas
try {
    $sql = "SELECT e.id, e.titulo, e.descripcion, c.nombre AS categoria, 
                   u.nombre AS autor, e.fecha 
            FROM entradas e
            INNER JOIN categorias c ON e.categoria_id = c.id
            INNER JOIN usuarios u ON e.usuario_id = u.id
            ORDER BY e.fecha DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $entradas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener las entradas: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Entradas</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>

<body>
    <?php require_once './requires/header.php'; ?>

    <main>
        <?php if (!empty($entradas)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($entradas as $entrada): ?>
                        <tr>
                            <td><?= htmlspecialchars($entrada['titulo']) ?></td>
                            <td><?= htmlspecialchars(substr($entrada['descripcion'], 0, 100)) ?>...</td>
                            <td><?= htmlspecialchars($entrada['categoria']) ?></td>
                            <td><?= htmlspecialchars($entrada['autor']) ?></td>
                            <td><?= htmlspecialchars($entrada['fecha']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay entradas disponibles.</p>
        <?php endif; ?>
    </main>
</body>

</html>