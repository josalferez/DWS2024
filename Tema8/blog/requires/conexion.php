<?php
// Configuración de la base de datos
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'blog';

try {
    // Crear la conexión con PDO
    $dsn = "mysql:host=$servidor;dbname=$basededatos;charset=utf8";
    $db = new PDO($dsn, $usuario, $password);

    // Configurar PDO para que lance excepciones en caso de error
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Establecer el juego de caracteres a UTF-8 (opcional, ya está en el DSN)
    $db->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    // Manejo de errores en caso de que falle la conexión
    die("Error en la conexión: " . $e->getMessage());
}
?>
