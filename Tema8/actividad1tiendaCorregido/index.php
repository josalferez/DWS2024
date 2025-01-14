<?php
// Configuración de la conexión con PDO
    $dsn = "mysql:host=localhost;dbname=mistiendas;charset=utf8mb4";
    $username = "root";
    $password = "1234";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa<br>";
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

// Si se envía el formulario
if (isset($_POST['producto'])) {
    $producto = $_POST['producto'];

    // Consulta para obtener el stock del producto seleccionado en cada tienda
    $sql = "SELECT tiendas.nombre AS tienda, stock.unidades 
            FROM tiendas 
            INNER JOIN stock ON tiendas.cod = stock.tienda 
            WHERE stock.producto = :producto";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':producto' => $producto]);
    $stock = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Consulta para obtener todos los productos
$sql = "SELECT cod, nombre_corto FROM productos ORDER BY nombre_corto";
$stmt = $pdo->query($sql);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Guardamos los productos como array en $productos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Productos</title>
</head>
<body>
    <h1>Ejercicio: Conjuntos de resultados en PDO</h1>

    <!-- Formulario con el desplegable de productos -->
    <form method="POST">
        <label for="producto">Producto:</label>
        <select name="producto" id="producto" required>
            <?php 
            foreach ($productos as $prod): ?>
                <option value="<?= htmlspecialchars($prod['cod']) ?>">
                    <?= htmlspecialchars($prod['nombre_corto']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Mostrar stock</button>
    </form>

    <!-- Resultado del stock -->
    <?php if (isset($stock)): ?>
        <h2>Stock del producto seleccionado</h2>
        <table border="1">
            <tr>
                <th>Tienda</th>
                <th>Unidades</th>
            </tr>
            <?php if (count($stock) > 0): ?>
                <?php foreach ($stock as $fila): ?>
                    <tr>
                        <td><?= htmlspecialchars($fila['tienda']) ?></td>
                        <td><?= htmlspecialchars($fila['unidades']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">No hay stock para este producto.</td>
                </tr>
            <?php endif; ?>
        </table>
    <?php endif; ?>
</body>
</html>
