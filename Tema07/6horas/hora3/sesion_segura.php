
<meta http-equiv="refresh" content="60"> <!-- Refresco a los 60 segundos -->

<?php
session_start();

// Configurar un tiempo de vida para la sesión
$tiempoDeVida = 1 * 60; // 1 minuto
if (isset($_SESSION['tiempoInicioSesion']) && (time() - $_SESSION['tiempoInicioSesion'] > $tiempoDeVida)) {
    session_unset();
    session_destroy();
    header("Location: ./login.php");
    exit;
}
$_SESSION['tiempoInicioSesion'] = time(); // Reiniciar el temporizador

// Regenerar el ID de sesión. De esta forma prevenimos ataques de secuestro de sesión
session_regenerate_id(true);

// Ejemplo de uso
$_SESSION['usuario'] = "Maria Lopez";
echo "Bienvenida, " . $_SESSION['usuario'];
?>
