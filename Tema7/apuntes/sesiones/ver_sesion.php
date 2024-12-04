<?php
// Reanuda la sesión existente
session_start();

if (isset($_SESSION['usuario'])) {
    echo "Usuario en sesión: " . $_SESSION['usuario'] . "<br>";
    echo "Rol: " . $_SESSION['rol'];
} else {
    echo "No hay datos en la sesión.";
}
?>
<br>
<a href="iniciar_sesion.php">Iniciar sesión</a>
<a href="cerrar_sesion.php">Cerrar sesión</a>
