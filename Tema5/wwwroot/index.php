<link rel="stylesheet" href="../css/estilos.css">
<?php
include 'datos.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['usuario']) && isset($_GET['contraseña'])) {
    $usuario = $_GET['usuario'];
    $contraseña = $_GET['contraseña'];
    try {
        if (login($usuario, $contraseña)) {
            escribeUsuario($usuario);
            escribePrestamos($usuario);
        } else {
            echo "Error: Usuario o contraseña incorrectos.";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
?>
    <form method="get" action="index.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
<?php
}
?>
