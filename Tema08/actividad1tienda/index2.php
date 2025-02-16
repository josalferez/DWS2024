<?php

// 1. Creamos la conexión a la BBDD para realizar las consultas
$username = "root";
$password = "";
$dsn = "mysql:host=localhost;dbname=mistiendas;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexion realizada con éxito";
} catch (PDOException $e) {
    die("Error al conectar con la base de datsos: " . $e->getMessage());
}

if (isset($_POST['producto'])){
    $producto = $_POST['producto'];
    $sql = "SELECT tiendas.nombre AS tienda, stock.unidades
            FROM tiendas
            INNER JOIN stock ON tiendas.cod = stock.tienda
            WHERE stock.producto = :producto";

    $stmt = $pdo->prepare($sql); // Preparamos la consulta para que se realice en modo seguro   
    $stmt->bindParam(':producto', $producto);
    $stmt->execute();
    $stock = $stmt->fetchAll(PDO::FETCH_ASSOC); // Creamos un array asociativo con la respuesta a la consulta
}


// 3. Voy a rellenar el formulario con los productos de mi base de datos
$sql = "select cod,nombre_corto from productos";
$stmt = $pdo->query($sql);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- 2. Creamos el formulario -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de productos</title>
</head>

<body>
    <h1> Ejercicio: Conjunto de resultados en PDO </h1>
    <form method="POST">
        <label for="producto">Producto: </label>
        <select name="producto" id="producto" required>
            <?php foreach ($productos as $producto) { ?>
                <option value="<?php echo $producto['cod'] ?>"><?php echo $producto['nombre_corto']; ?></option>
            <?php } ?>
        </select>
        <button type="submit"> Mostrar Stock </button>
    </form>

<!-- 4. Imprimimos el stock del producto por tienda-->
<?php if (isset($stock)):?>
    <h2> Stock del producto </h2>
    <table border="1">
        <tr>
            <th>Tienda</th>
            <th>Stock</th>
        </tr>
       <?php foreach ($stock as $fila): ?>
        <tr>
            <td> <?php echo $fila['tienda']?></td>
            <td> <?php echo $fila['unidades']?></td>
        </tr>
        <?php endforeach; ?>

    </table>
    <?php endif; ?>

</body>

</html>