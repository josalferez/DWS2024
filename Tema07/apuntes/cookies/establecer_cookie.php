<?php
// Crear una cookie que expira en 1 hora
setcookie("usuario", "Juan", time() + 3600); // Nombre: 'usuario', Valor: 'Juan'

echo "Cookie establecida para el usuario.";
?>
<br>
<a href="ver_cookie.php">Ver cookie</a>
<a href="eliminar_cookie.php">Eliminar cookie</a>
