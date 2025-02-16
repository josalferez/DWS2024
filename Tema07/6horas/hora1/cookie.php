<?php
// Crear una cookie que expire en 1 hora
setcookie("usuario", "Jose Alfrz", time() + 3600);

// Leer la cookie
if (isset($_COOKIE['usuario'])) {
    echo "Bienvenido, " . $_COOKIE['usuario'];
} else {
    echo "No hay cookie disponible.";
}
?>
