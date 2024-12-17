<?php
// Configurar el nombre y duración de la cookie
$cookie_name = "accept_cookies";
$cookie_duration = 365 * 24 * 60 * 60; // 1 año en segundos

// Verificar si la cookie ya está establecida
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear la cookie al aceptar
    setcookie($cookie_name, "accepted", time() + $cookie_duration, "/");
    // Recargar para reflejar el cambio
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
$show_banner = !isset($_COOKIE[$cookie_name]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Política de Cookies</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<?php if ($show_banner): ?>
    <div class="cookie-banner">
        <span>Este sitio web utiliza cookies para garantizar la mejor experiencia. Al continuar, aceptas nuestra <a href="#" style="color: #4CAF50; text-decoration: underline;">política de cookies</a>.</span>
        <form method="POST" style="margin: 0;">
            <button type="submit">Aceptar</button>
        </form>
    </div>
<?php endif; ?>

<h1>Bienvenido a nuestro sitio web</h1>
<p>El contenido principal de la página se muestra aquí.</p>

</body>
</html>