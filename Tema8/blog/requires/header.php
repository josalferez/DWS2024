<?php
require_once 'conexion.php';
?>
<header>
    <div class="container">
        <h1>Blog de 2º DAW</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
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
                    <form action="buscar.php" method="GET" style="display: inline;">
                        <label for="query">Buscar:</label>
                        <input type="text" id="query" name="query" placeholder="Buscar por título" required>
                        <button type="submit">Buscar</button>
                    </form>
                </li>
            <ul>

            </ul>


        </nav>
    </div>
</header>