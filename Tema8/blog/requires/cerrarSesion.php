<?php
// Me aseguro que la sesión esté iniciada
session_start();

// Cerrar sesión
session_unset(); // Eliminar variables de sesión
session_destroy(); // Destruir la sesión

header("Location: ../index.php");
exit();