<?php // Iniciamos una session
session_start();

// Inicializamos la variable de sesión 'loginExito' si no está definida
if (!isset($_SESSION['loginExito']))
    $_SESSION['loginExito'] = false;
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de Videojuegos</title>
    <link rel="stylesheet" href="./assets/css/estilo.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>Blog de 2º DAW</h1>
            <nav>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Acción</a></li>
                    <li><a href="#">Rol</a></li>
                    <li><a href="#">Deportes</a></li>
                    <li><a href="#">Responsabilidad</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">
        <section class="content">
            <h2>Últimas entradas</h2>
            <article>
                <h3>Título de mi entrada</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat est sit amet sapien sodales, ac lacinia est vehicula. Sed luctus sit amet mi vitae lobortis.</p>
            </article>
            <article>
                <h3>Título de mi entrada</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat est sit amet sapien sodales, ac lacinia est vehicula. Sed luctus sit amet mi vitae lobortis.</p>
            </article>
            <article>
                <h3>Título de mi entrada</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat est sit amet sapien sodales, ac lacinia est vehicula. Sed luctus sit amet mi vitae lobortis.</p>
            </article>
            <button>Ver todas las entradas</button>
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
                    <form action="">
                        <button>Crear entrada</button>
                        <button>Crear categoría</button>
                        <button>Mis datos</button>
                        <button>Cerrar sesión</button>
                    </form>
                </div>

            <?php
            } ?>

        </aside>
    </main>


</body>

</html>