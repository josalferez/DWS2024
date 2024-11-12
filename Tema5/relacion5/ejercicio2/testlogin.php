<?php
function testLogin($usuarioInput, $passwordInput) {
    // Simula el envío del formulario con datos POST
    $_POST['usuario'] = $usuarioInput;
    $_POST['password'] = $passwordInput;
    $_POST['submit'] = true;

    // Captura el output del login para analizar el resultado
    ob_start();
    include 'loginSinSesion.php';
    $output = ob_get_clean();

    return $output;
}

// Pruebas
echo "<h2>Pruebas de login:</h2>";

// Prueba 1: Usuario y contraseña correctos
echo "<h3>Prueba 1: Usuario y contraseña correctos</h3>";
echo testLogin('usuario', '1234');

// Prueba 2: Usuario incorrecto
echo "<h3>Prueba 2: Usuario incorrecto</h3>";
echo testLogin('otroUsuario', '1234');

// Prueba 3: Contraseña incorrecta
echo "<h3>Prueba 3: Contraseña incorrecta</h3>";
echo testLogin('usuario', '4321');

// Prueba 4: Usuario y contraseña incorrectos
echo "<h3>Prueba 4: Usuario y contraseña incorrectos</h3>";
echo testLogin('otroUsuario', '4321');

// Prueba 5: Campos vacíos
echo "<h3>Prueba 5: Campos vacíos</h3>";
echo testLogin('', '');
?>
