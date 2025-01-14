<?php
session_start();

// Cerrar sesión
session_unset(); // Eliminar variables de sesión
session_destroy(); // Destruir la sesión


echo "Sesión cerrada con éxito.";
echo "<script>
setTimeout(function() {
    window.location.href = 'index.php';
}, 2000);
</script>";

