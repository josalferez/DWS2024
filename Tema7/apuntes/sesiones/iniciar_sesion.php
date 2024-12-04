<?php
// Inicia la sesión
session_start();

// Guardar datos en la sesión
$_SESSION['usuario'] = 'Gonzalo';
$_SESSION['rol'] = 'Moderador';

echo "Sesión iniciada. Usuario: " . $_SESSION['usuario'] . " con rol: " . $_SESSION['rol'];
?>
<br>
<a href="ver_sesion.php">Ver sesión</a>
<a href="cerrar_sesion.php">Cerrar sesión</a>
