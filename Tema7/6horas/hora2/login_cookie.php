<?php

/** 40 minutos
 * Crear un formulario de inicio de sesión que:
 * Almacene el nombre de usuario en una cookie con un tiempo de expiración de 7 días.
 * Muestre un mensaje de bienvenida si la cookie existe.
 * Permita al usuario cerrar sesión, eliminando la cookie.
 */

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Iniciar sesión guardando la cookie
     $usuario = $_POST['usuario'] ?? '';
     setcookie("usuario_login", $usuario, time() + 7 * 24 * 60 * 60); // 7 días
     header("Location: login_cookie.php"); // Redirigir para evitar reenvío del formulario
     exit;
 }
 
 // Cerrar sesión eliminando las cookies
 if (isset($_GET['logout'])) {
     setcookie("usuario_login", "", time() - 1); // Expira en el pasado
     header("Location: login_cookie.php");
     exit;
 }
 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../../Tema5/css/estilos.css">
     <title>Inicio de Sesión con Cookies</title>
 </head>
 <body>
     <?php if (isset($_COOKIE['usuario_login'])){ ?>
         <h1>Bienvenido de nuevo, <?php echo htmlspecialchars($_COOKIE['usuario_login']); ?>!</h1>
         <a href="?logout=true">Cerrar sesión</a>
     <?php }else{ ?>
         <form method="POST" action="">
             <label for="usuario">Nombre de usuario:</label>
             <input type="text" id="usuario" name="usuario" required>
             <button type="submit">Iniciar sesión</button>
         </form>
     <?php } ?>
 </body>
 </html>
 