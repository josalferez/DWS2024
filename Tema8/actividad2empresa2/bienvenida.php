<?php
session_start();
require_once '../actividad2empresa2/lib/conexion.php';
require_once '../actividad2empresa2/config/config.php';

// Crear una instancia de la clase de conexión
$conn = new Conexion();
$pdo = $conn->getPdo();

$limit = 10; // Número de resultados por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Consultar productos con paginación
$productos = [];
try {
    $stmt = $pdo->prepare("SELECT * FROM productos LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Contar el total de productos para calcular el número de páginas
    $totalStmt = $pdo->query("SELECT COUNT(*) FROM productos");
    $total = $totalStmt->fetchColumn();
    $totalPages = ceil($total / $limit);
} catch (PDOException $e) {
    echo "Error al recuperar datos: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja de Bienvenida</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <a href="logout.php">Cerrar Sesión</a>
    <a href="modificarUsuario.php">Modificar Usuario</a>
    <?php if ($_SESSION['rol'] == 'admin') { ?>
        <a href="">Zona Admin</a>
        <a href="eliminarUsuario.php">Eliminar Usuario</a>
    <?php } ?>
    <br>
    Hola <?php echo htmlspecialchars($_SESSION['nombre']); ?>

    <h2>Stock de Productos</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre del Producto</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($producto['cod']); ?></td>
                        <td><?php echo htmlspecialchars($producto['nombre_corto']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">No se encontraron productos.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Paginación -->
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>">Anterior</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page + 1; ?>">Siguiente</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>