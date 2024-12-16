<?php
/** 30 minutos
 * Crear un archivo PHP que haga lo siguiente:
 * Establecer una cookie llamada visita con un mensaje de bienvenida.
 * Crear una sesión que cuente cuántas veces el usuario ha visitado la página.
 * Mostrar un mensaje como:
 * Primera visita: "¡Bienvenido, esta es tu primera visita!".
 * Visitas repetidas: "Bienvenido de nuevo, esta es tu visita número X."
 */

session_start(); // Iniciar sesión

// Crear una cookie
if (!isset($_COOKIE['visita'])) {
    setcookie("visita", "true", time() + 60 * 60); // Expira en 1 hora
    echo "¡Bienvenido, esta es tu primera visita!<br>";
} else {
    echo "Bienvenido de nuevo.<br>";
}

// Contador de visitas con sesión
$_SESSION['visitas'] = $_SESSION['visitas'] ?? 0; // ?? Si $_SESSION['visitas'] no está definida o es null entonces le asigno 0 y se lo meto a la vble $_SESSION['visitas']
$_SESSION['visitas']++;

echo "Esta es tu visita número: " . $_SESSION['visitas'];
?>
