<?php
// Defino la constante BASE_PATH
if (!defined('BASE_PATH')) {
    define('BASE_PATH','http://localhost/DWS2024/Tema8/blog/'); // Ruta base del proyecto
    echo "BasePath redefinida en header.php ¡Revisa esto!" . BASE_PATH . '<br>'; 
}

//Inicio la sesión en caso de que no lo esté
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//Incluyo la conexión a la base de datos
require_once BASE_PATH . 'requires/conexion.php';
?>

<header>
    <div class="container">
        <h1>Blog de 2º DAW</h1>
        <nav>
            <ul>
                <li><a href="<?php echo BASE_PATH; ?>index.php">Inicio</a></li>
                <?php if (!empty($categorias)): ?>
                    <?php foreach ($categorias as $categoria): ?>
                        <li><a href="acciones/entradasCategoria.php?id=<?= $categoria['id'] ?>"><?= htmlspecialchars($categoria['nombre']) ?></a></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li><a href="#">Sin categorías</a></li>
                <?php endif; ?>
                <li><a href="#">Responsabilidad</a></li>
                <li><a href="#">Contacto</a></li>
                <li style="float: right;">
                    <form action="<?php BASE_PATH . 'acciones/buscar.php'?>" method="GET" style="display: inline;">
                        <label for="query">Buscar:</label>
                        <input type="text" id="query" name="query" placeholder="Buscar por título" required>
                        <button type="submit">Buscar</button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</header>