<?php
// Configurar una cookie con opciones avanzadas
setcookie(
    "usuario_avanzado", 
    "Maria Lopez", 
    [
        "expires" => time() + 86400, // 1 día
        "path" => "/",               // Disponible en todo el sitio
        "secure" => false,           // Cambiar a true en HTTPS
        "httponly" => true           // No accesible desde JavaScript
    ]
);

// Leer la cookie
if (isset($_COOKIE['usuario_avanzado'])) {
    echo "Bienvenido, " . $_COOKIE['usuario_avanzado'];
} else {
    echo "No se ha configurado la cookie.";
}
?>