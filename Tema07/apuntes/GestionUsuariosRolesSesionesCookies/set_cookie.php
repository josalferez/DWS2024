<?php

use App\Gestion\GestorSesion;

$gestorSesion = new GestorSesion();

// Simular inicio de sesión
$nombre = "Juan";
$rol = "Administrador"; // Cambia a "Moderador" o "Usuario" para probar otros roles

$gestorSesion->iniciarSesion($nombre, $rol);

echo "Sesión iniciada para $nombre con el rol $rol.";
