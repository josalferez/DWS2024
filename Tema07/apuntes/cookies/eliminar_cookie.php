<?php
// Para eliminar una cookie, establece su tiempo de expiración en el pasado
setcookie("usuario", "", time() - 3600);

echo "Cookie eliminada.";
?>
<br>
<a href="establecer_cookie.php">Establecer cookie</a>
<a href="ver_cookie.php">Ver cookie</a>
