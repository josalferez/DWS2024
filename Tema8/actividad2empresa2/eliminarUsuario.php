<?php
session_start();

require_once 'config/config.php';
require_once 'lib/conexion.php';

$conexion = new Conexion();
$pdo = $conexion->getPdo();

if (isset($_POST['eliminar'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar usuario</title>
</head>
<body>
    <a href="bienvenida.php">Volver</a><br> 
    <form method="post" action="eliminarUsuario.php">
        <label for="email">Email: </label>
        <input type="email" name="email" value="<?php echo $_SESSION['email'] ?>"><br>
        <input type="submit" name="eliminar" value="Eliminar">  
    </form>
    
</body>
</html>