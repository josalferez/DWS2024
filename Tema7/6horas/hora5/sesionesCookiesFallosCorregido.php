<?php

/**
 * Error 1: Falta de comprobación de isset($_GET['action']). 
 * Error 2: No se especifica una ruta para la cookie. 
 * Error 3: No se valida si el método es GET antes de usar $_GET.
 */

session_start();

$_SESSION['usuario'] = 'admin';
setcookie('bienvenida', 'admin', time() + 86400, '/'); // Indica que la cookie se usará en todo el dominio

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();
    session_destroy();
    setcookie('bienvenida', '', time() - 3600, '/');
    header("Location: sesionesCookiesFallosCorregidos.php");
    exit;
}
