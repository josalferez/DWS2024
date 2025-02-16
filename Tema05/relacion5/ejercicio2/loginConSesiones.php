<!DOCTYPE html>
<?php

// Inicializamos la sesion
session_start();

// Inicializamos el log-in
if (!isset($_SESSION['logging'])) {
    $_SESSION['logging'] = false;
}

// Usuario y contraseña
$usuario = "usuario";
$password = "1234";
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ej4 - Log-in</title>
    </head>
    <body>
        <?php
        // Si no se esta logueado saldra el formulario para loguearse
        if ($_SESSION['logging'] == false) {
            
            // Si es la primera vez que entramos
            if (!isset($_POST['submit'])) {
                
                // Craeamos el formulario para loguear
                ?>
                <p>Introduzca Usuario y contraseña</p>
                <form action="login.php" method="post">
                    Usuario: <input type="text" name="usuario" placeholder="usuario" autofocus><br>
                    Contraseña: <input type="password" name="password"><br>
                    <input type="submit" name="submit" value="logging">
                </form>
            <?php
            } else { // Si ya hemos mandado el formulario
                
                // Comprobamos si se ha introducido el usuario y contraseña correctamente
                if ($_POST['usuario'] == $usuario && $_POST['password'] == $password) {
                    
                    // Nos logueamos y lo ponemos a true
                    $_SESSION['logging'] = true;
                    // Refrescamos la pagina
                    header("refresh: 0;");
                    
                    // Tambien sirve para refresca (nos envia a la misma pagina)
                    //header("location:index.php");
                    
                } else { // Si fallamos al loguearnos
                    
                    // Volvemos a crear el formulario pero advirtiendo de que lo hemos hecho mal
                    ?>
                    <p>Error, usuario o contraseña incorrectos.</p>
                    <form action="login.php" method="post">
                        Usuario: <input type="text" name="usuario" placeholder="usuario" autofocus><br>
                        Contraseña: <input type="password" name="password"><br>
                        <input type="submit" name="submit" value="logging">
                    </form>
                <?php
                } // Fin del else de fallo al loguear 
            } // Fin del else de que ya hemos mandado el formulario
            
        } else { // Si estamos logueados
            ?>
            Has logueado con exito
            <!-- Formulario para desloguear -->
            <form action="login.php" method="post">
                <input type="submit" name="logout" value="logout">
            </form>
            <?php
            
            // Si le damos al boton desloguear
            if (isset($_POST['logout'])) {
                // Nos deslogueamos
                $_SESSION['logging'] = false;
                // Recargamos pagina
                header("refresh: 0;");
            }
            
            // Error_reporting(0) simplemente para eliminar el error de "session already started" al hacer el include
            error_reporting(0);            
        }
        ?>
    </body>
</html>