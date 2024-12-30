<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compra</title>
    <link rel="stylesheet" href="./assets/css/estilo.css">
</head>
<body>
    <!-- Inicio de sesión -->
    <form action="login.php" method="post">
        Usuario: <input type="text" name="usuario">
        Clave: <input type="password" name="clave">
        <button type="submit">Enviar consulta</button>
    </form>
    <p>Usuario: madrid1@empresa.com <a href="home.php">Home</a> <a href="carrito.php">Ver carrito</a> <a href="logout.php">Cerrar sesión</a></p>
    
    <!-- Lista de categorías -->
    <h2>Lista de categorías</h2>
    <ul>
        <li><a href="categoria.php?cat=1">Bebidas con</a></li>
        <li><a href="categoria.php?cat=2">Bebidas sin</a></li>
        <li><a href="categoria.php?cat=3">Comida</a></li>
    </ul>

    <!-- Productos de categoría -->
    <h2>Bebidas con</h2>
    <p>Bebidas con alcohol</p>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Peso</th>
            <th>Stock</th>
            <th>Comprar</th>
        </tr>
        <tr>
            <td>Cerveza Alhambra tercio</td>
            <td>24 botellas de 33cl</td>
            <td>10 kg</td>
            <td>5</td>
            <td><button>Comprar</button></td>
        </tr>
        <tr>
            <td>Vino tinto Rioja</td>
            <td>6 botellas de 0.75</td>
            <td>5 kg</td>
            <td>10</td>
            <td><button>Comprar</button></td>
        </tr>
    </table>

    <!-- Carrito de compra -->
    <h2>Carrito de la compra</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Peso</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>
        <tr>
            <td>Sal</td>
            <td>20 paquetes de 1kg</td>
            <td>20 kg</td>
            <td>1</td>
            <td><button>Eliminar</button></td>
        </tr>
    </table>
    <p><a href="pago.php">Realizar pedido</a></p>

    <!-- Confirmación -->
    <p>Pedido realizado con éxito. Se enviará un correo de confirmación a: madrid1@empresa.com</p>
    <p><a href="index.php">Ir a la página de login</a></p>
</body>
</html>
