<?php

// Configuración de la conexión con PDO. 
$dsn = "mysql:host=localhost;dbname=mistiendas;charset=utf8mb4"; // Definimos la cadena de conexión a la base de datos
$username = "root"; // Pon aquí los valores de tu usuario y contraseña en mysql
$password = "1234"; // Puede que en vuestro caso si no habéis cambiado nada la contraseña esté vacía

// Conecto a la base de datos con los datos guardados en las líneas anteriores	
try {
    $pdo = new PDO($dsn, $username, $password); // Instancion un objeto de la clase PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Establezco el modo de error en las consultas a la base de datos a excepción. Es decir, si se genera algún erro en la consulta, ese error se recogerá en un bloque try catch
    echo "Conexión exitosa";
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage()); // Si no se puede conectar a la base de datos muestro un mensaje de error
}


// Si se envía el formulario
if (isset($_POST['producto'])) {
    $producto = $_POST['producto'];

    // Consulta para obtener el stock del producto seleccionado en cada tienda
    // :producto Es un marcador de posición utilizado en consultas preparadas para evitar inyecciones SQL
    // $pdo->prepare($sql); Usa el objeto $pdo para preparar la consulta SQL. Esto optimiza la ejecución y permite usar parámetros seguros (:producto).
    // $stmt->execute([':producto' => $producto]); Ejecuta la consulta preparada y reemplaza el marcador :producto con el valor de la variable $producto.
    // $stock = $stmt->fetchAll(PDO::FETCH_ASSOC); Recupera todas las filas resultantes de la consulta como un array asociativo. Cada fila representa una tienda con el stock del producto seleccionado.
    // ¿Por qué se usa PDO::FETCH_ASSOC? Este modo devuelve las filas como arrays asociativos, donde las claves son los nombres de las columnas de la consulta SQL (en este caso, tienda y unidades).
    $sql = "SELECT tiendas.nombre AS tienda, stock.unidades 
            FROM tiendas 
            INNER JOIN stock ON tiendas.cod = stock.tienda 
            WHERE stock.producto = :producto";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':producto' => $producto]);
    $stock = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Consulta para obtener todos los productos
$sql = "SELECT cod, nombre FROM productos ORDER BY nombre";
$stmt = $pdo->query($sql);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <?php foreach ($productos as $prod): ?>
                <option value="<?= htmlspecialchars($prod['cod']) ?>">
                    <?= htmlspecialchars($prod['nombre']) ?>
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
