<?php 
/* Esta es una página de bienvenida.
*  En ella, si el rol del usuario es admin. Se cargará un enlace arriba que pondrá "Zona admin", y en el body una página que ponga hola y el nombre del usuario.
*  Si el rol del usuario es usuario, se cargará solamente el body que podrá hola usuario.
*/
session_start();
require_once 'config/config.php';
require_once 'lib/conexion.php';

$conexion = new Conexion();
$pdo = $conexion->getPdo();

?>
<body>
<a href="modificarUsuario.php"> Modificar Usuario</a>
<?php

if ($_SESSION['rol'] == 'admin') {
    echo '<a href="zona_admin.php">Zona admin</a>';
    echo '<h1>Hola ' . $_SESSION['nombre'] . '</h1>';
} else {
    echo '<h1>Hola ' . $_SESSION['nombre'] . '</h1>';
}
?>



</body>