<?php
// Reanuda la sesión existente
session_start();

// Destruye la sesión
session_unset();
session_destroy();

echo "Sesión cerrada.";
?>
<br>
<a href="iniciar_sesion.php">Iniciar sesión</a>
