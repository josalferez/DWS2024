<?php
session_start();
require_once '../actividad2empresa2/lib/conexion.php';
require_once '../actividad2empresa2/config/config.php';

// Crear una instancia de la clase de conexión
$conn = new Conexion();
$pdo = $conn->getPdo();

// Consultar todos los productos
$productos = [];
try {
    $stmt = $pdo->prepare("SELECT * FROM productos"); // Asegúrate de que 'productos' sea el nombre correcto de tu tabla
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
</head>

<body>
    <a href="logout.php">Cerrar Sesión</a>
    <a href="modificarUsuario.php"> Modificar Usuario</a>
    <?php if ($_SESSION['rol'] == 'admin') { ?>
        <a href="">Zona Admin</a>
        <a href="eliminarUsuario.php">Eliminar Usuario</a>
    <?php } ?>
    <br>
    Hola <?php echo $_SESSION['nombre']; ?>

    <h2>Stock de Productos</h2>
    <table border="1">
        <tr>
            <th>Nombre del Producto</th>
            <th>Stock</th>
        </tr>
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
    </table>

</body>

</html>