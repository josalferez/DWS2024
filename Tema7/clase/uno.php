
<?php
session_start();

$usuarioError = $contraseniaError="";
$usuario = $_POST['usuario'] ?? "";
$password = $_POST['password'] ?? "";
var_dump($_POST);
var_dump($_SESSION);
var_dump($_GET);

$usuarioValido = "admin";
$passwordValido = '1234';

if ($_SERVER['REQUEST_METHOD']==='POST'){
    //Compruebo que el usuario y la contraseña está correctos. 
    // 1. Validación del nombre
    if (empty($_POST["usuario"])) {
        $usuarioError = "<br><i>El nombre de usuario es obligatorio.";
    } else if ($usuario !== $usuarioValido) {
        $usuarioError = "<br><i>El nombre de usuario es incorrecto.";
    } 
    // 2. Validación de la contraseña
    if (empty($_POST["password"])) {
        $contraseniaError = "<br><i>La contraseña es obligatoria.";
    } else if ($password !== $passwordValido) {
        $contraseniaError = "<br><i>La contraseña es incorrecta.";
    } 

    // 3.Validacion Correta de usuario y Contraseña
    if ($password === $passwordValido && $usuario === $usuarioValido){
        $_SESSION['idUsuario'] = $usuario;
        setcookie("Bienvenida", $usuario, time() + 7 * 24 * 60 * 60, '/');
        
    // 4. Recargo la página para mostrar el mensaje de bienvenida. 
    header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']));
    exit();
    }

    var_dump($_GET);
    // 6. Si Pincha el salir destruyo la sesión
    if (isset($_GET['logout'])){
        session_unset();
        session_destroy();
        setcookie('Bienvenida', "", time() - 1, '/');
        header("Location: uno.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Tema7/css/estilo.css">
</head>
<body>
    <?php
    // 5. Si la cookie existe imprimo un mensaje de bienvenida, si no, muestro el formulario
    if (isset($_SESSION['idUsuario'])) {
    ?>
    <h1> Bienvenido, <?php echo htmlspecialchars($_SESSION['idUsuario']); ?> ! </h1>
    <a href="?logout=true">Cerrar Sesion</a>
    <?php 
    } else {
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        
        Usuario:<input type="text" id="usuario" name="usuario" value="<?php echo $usuario; ?>"> <br>
        <span style="color:red"><?php echo $usuarioError;?></span> <br><br>
        
        Contraseña:<input type="password" id="contraseña" name="password" value="<?php echo $password;?>"> <br>
        <span style="color:red"><?php echo $contraseniaError;?></span>
        
        <button type="submit">Login</button>
    </form>
    <?php } ?>
</body>
</html>

