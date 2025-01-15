<?php 
    session_start();  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja de Bienvenida</title>
</head>
<body>
    <a href="logout.php">Cerrar Sesión</a>
    <a href="modificarUsuario.php"> Modificar Usuario</a>
    <?php if ($_SESSION['rol'] == 'admin') { ?>
        <a href="">Zona Admin</a>
        <a href="eliminarUsuario.php">Eliminar Usuario</a>
    <?php }?>   
    <br>
    Hola <?php echo $_SESSION['nombre'];?>
</body>
</html>