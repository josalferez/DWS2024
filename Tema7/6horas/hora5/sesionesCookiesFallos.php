<?php
/**
 * Aprender a identificar y solucionar errores comunes en el manejo de sesiones
 *  y cookies, utilizando herramientas de debugging y buenas prácticas en PHP.
 */


session_start();

$_SESSION['usuario'] = 'admin';
setcookie('bienvenida', 'admin', time() + 86400, './es/'); // Ruta no especificada

if ($_GET['action'] == 'logout') { // Sin comprobar si está definido
    session_unset();
    session_destroy();
    setcookie('bienvenida', '', time() - 3600);
    header("Location: sesionesCookiesFallos.php");
}

