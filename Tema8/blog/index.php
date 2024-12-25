<?php // Iniciamos una session
session_start();

require_once './requires/conexion.php';
require_once './acciones/conseguirCategorias.php';
require_once './acciones/conseguirUltimasEntradas.php';

// Inicializamos la variable de sesión 'loginExito' si no está definida
if (!isset($_SESSION['loginExito']))
    $_SESSION['loginExito'] = false;

// Cargamos las categorías
$categorias = conseguirCategorias($db);

// Obtenemos las últimas entradas
$entradas = conseguirUltimasEntradas($db, true);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROYECTO DWES</title>
    <link rel="stylesheet" href="./assets/css/estilo.css">
</head>

<body>
<?php require_once './requires/header.php'; ?>
    <main class="container">
        <section class="content">
            <h2>Últimas entradas</h2>
            <?php if (!empty($entradas)): ?>
                <?php foreach ($entradas as $entrada): ?>
                    <article class="entrada">
                        <h3><?= htmlspecialchars($entrada['titulo']) ?></h3>
                        <span class="categoria"><?= htmlspecialchars($entrada['categoria']) ?> | <?= htmlspecialchars($entrada['fecha']) ?></span>
                        <p><?= htmlspecialchars($entrada['descripcion']) ?></p>
                        <a href="./acciones/verEntrada.php?id=<?= $entrada['id_entrada'] ?>" class="boton">Leer más</a>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay entradas disponibles.</p>
            <?php endif; ?>
            <form action="./acciones/listarEntradas.php" method="post">
                <button>Ver todas las entradas</button>
            </form>
        </section>
        <aside>
            <div class="widget">
                <h3>Buscar</h3>
                <form>
                    <input type="text" placeholder="Buscar">
                    <button>Buscar</button>
                </form>
            </div>
            <?php
            // Si el usuario ha hecho login correctamente, no mostramos ni el formulario de login ni el de registro
            $uno = 0;
            // if ($uno == 1) {
            if ($_SESSION['loginExito'] !== true) { ?>
                <div class="widget">
                    <h3>Identifícate</h3>
                    <form action="./requires/login.php" method="post">
                        <input type="email" name="email" placeholder="Email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
                        <input type="password" name="password" placeholder="Contraseña" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ''; ?>">
                        <button>Entrar</button>
                    </form>
                </div>
                <div class="widget">
                    <h3>Regístrate</h3>
                    <form action="./requires/registro.php" method="post">
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>">
                        <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo isset($_SESSION['apellidos']) ? $_SESSION['apellidos'] : ''; ?>">
                        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
                        <input type="password" id="password" name="password" placeholder="Contraseña">
                        <button>Registrar</button>
                    </form>
                </div>
            <?php } else {
            ?>
                <div class="widget">
                    <h1>Autor</h1>
                    <form action="./acciones/crearEntrada.php" method="post">
                        <button>Crear entrada</button>
                    </form>
                    <form action="./acciones/crearCategoria.php" method="post">
                        <button>Crear categoría</button>
                    </form>
                    <form action="./acciones/formularioUsuario.php" method="post">
                        <button>Mis datos</button>
                    </form>
                    <!-- Si pulsa en cerrar sesión, se redirige a la página de cerrar sesión -->
                    <form action="./requires/cerrarSesion.php" method="post">
                        <button>Cerrar sesión</button>
                    </form>

                </div>

            <?php
            } ?>

        </aside>
    </main>


</body>

</html>