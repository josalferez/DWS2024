<?php
session_start();

// Inicializar la variable de sesión para el carrito
if (!isset($_SESSION['productosEnCesta'])) {
    $_SESSION['productosEnCesta'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producto'], $_POST['cantidad'])) {
    $producto = $_POST['producto'];
    $cantidad = intval($_POST['cantidad']);

    if ($cantidad > 0) {
        // Si el producto ya existe en la cesta, sumamos la cantidad
        if (isset($_SESSION['productosEnCesta'][$producto])) {
            $_SESSION['productosEnCesta'][$producto] += $cantidad;
        } else {
            // Si no existe, lo añadimos
            $_SESSION['productosEnCesta'][$producto] = $cantidad;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de la Compra</title>
</head>
<body>
    <h1>Carrito de la Compra</h1>

    <form method="POST">
        <label for="producto">Producto:</label>
        <input type="text" id="producto" name="producto" required>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" min="1" required>

        <button type="submit">Comprar</button>
    </form>

    <h2>Carrito Actual</h2>
    <?php if (!empty($_SESSION['productosEnCesta'])): ?>
        <ul>
            <?php foreach ($_SESSION['productosEnCesta'] as $producto => $cantidad): ?>
                <li><?php echo htmlspecialchars($producto) . ": " . intval($cantidad); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>

    <h2>Finalizar Compra</h2>
    <form method="POST" action="vaciar_carrito.php">
        <button type="submit">Vaciar Carrito</button>
    </form>
</body>
</html>
