<?php
/**
 * Aprender a identificar y solucionar errores comunes en el manejo de sesiones
 *  y cookies, utilizando herramientas de debugging y buenas prácticas en PHP.
 */


session_start();

$_SESSION['usuario'] = 'admin';
setcookie('bienvenida', 'admin', time() + 86400); // Ruta no especificada

if ($_GET['action'] == 'logout') { // Sin comprobar si está definido
    session_unset();
    session_destroy();
    setcookie('bienvenida', '', time() - 3600);
    header("Location: sesionesCookiesFallos.php");
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
