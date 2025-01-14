<?php
require_once 'bd.php';
/* formulario de login habitual
si va bien abre sesión, guarda el nombre de usuario y redirige a principal.php
si va mal, mensaje de error */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usu = comprobar_usuario($_POST['usuario'], $_POST['clave']);
    if ($usu === FALSE) {
        $err = TRUE;
        $usuario = $_POST['usuario'];
    } else {
        session_start();
        // $usu tiene campos correo y codRes
        $_SESSION['usuario'] = $usu;
        $_SESSION['carrito'] = [];
        header("Location: categorias.php");
        return;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario de login</title>
    <meta charset="UTF-8">
</head>
<body>
    <?php if (isset($_GET["redirigido"])) { ?>
        <p>Haga login para continuar</p>
    <?php } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="usuario">Usuario</label>
        <input value="<?php 
            if (isset($usuario) && !isset($err)) 
                echo $usuario; 
            else if (isset($err) && $err == TRUE ){
                ?> Revise usuario o contraseña<?php 
            } ?>" id="usuario" name="usuario" type="text">
        
        <label for="clave">Clave</label>
        <input id="clave" name="clave" type="password">
        <br>
        <input type="submit">
    </form>
</body>
</html>