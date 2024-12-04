<?php
if (isset($_COOKIE['usuario'])) {
    echo "Cookie de usuario: " . $_COOKIE['usuario'];
    echo "<br<>" . var_dump($_COOKIE);
} else {
    echo "La cookie no está disponible.";
}
?>
<br>
<a href="establecer_cookie.php">Establecer cookie</a>
<a href="eliminar_cookie.php">Eliminar cookie</a>
