<?php
session_start();   // Nos aseguramos de tener activa la sesión
session_unset();   // Eliminamos todas de las variables de la sesión
session_destroy(); // Destruimos la sesión
setcookie('bienvenida', '', time() - 3600, '/'); // Borro la cookie
header("Location: index.php");
exit;
?>
