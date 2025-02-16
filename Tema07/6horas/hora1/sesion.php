<?php
session_start(); // Iniciar sesión

// Crear una variable de sesión
$_SESSION['contador'] = $_SESSION['contador'] ?? 0;
$_SESSION['contador']++;

// Mostrar el valor de la sesión
echo "Has visitado esta página " . $_SESSION['contador'] . " veces.";
?>
