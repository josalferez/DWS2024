<?php
// conexion.php

// Configuración de la conexión con PDO.
$dsn = "mysql:host=localhost;dbname=miclinica;charset=utf8mb4"; // Cadena de conexión a la base de datos
$username = "root"; // Usuario de la base de datos
$password = ""; // Contraseña de la base de datos (en este caso, está vacía)

// Intento conectar a la base de datos
try {
    $pdo = new PDO($dsn, $username, $password); // Creo una instancia de PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configuro el manejo de errores
    echo "Conexión exitosa a la base de datos 'miclinica'."; // Mensaje de éxito
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage()); // Mensaje de error si la conexión falla
}
?>