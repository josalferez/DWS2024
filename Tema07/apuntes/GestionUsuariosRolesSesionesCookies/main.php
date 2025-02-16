<?php

require_once 'src/Roles/RolInterface.php';
require_once 'src/Roles/Administrador.php';
require_once 'src/Roles/Moderador.php';
require_once 'src/Roles/Usuario.php';
require_once 'src/Gestion/GestorUsuarios.php';
require_once 'src/Gestion/GestorSesion.php';
require_once 'set_cookie.php';

use App\Roles\Administrador;
use App\Roles\Moderador;
use App\Roles\Usuario;
use App\Gestion\GestorUsuarios;
use App\Gestion\GestorSesion;

// Iniciar sesión y cookies
session_start();
$gestorSesion = new GestorSesion();

// Mostrar el rol del usuario
$rol = $gestorSesion->obtenerRolUsuario();
if ($rol === null) {
    echo "No hay un usuario autenticado. Por favor, inicia sesión." . "<br>";
    exit;
}

echo "Usuario autenticado con el rol: $rol" . "<br>";

//Creamos el gestor de usuarios
$gestor = new GestorUsuarios();

$admin = new Administrador();
$moderador = new Moderador();
$usuario = new Usuario();

$gestor->agregarUsuarios("Jose",$admin);
$gestor->agregarUsuarios("Sara",$moderador);
$gestor->agregarUsuarios("Alonso",$usuario);

echo "Permisos de Jose: " . $gestor->mostrarPermisosUsuario("Jose") . "<br>";
echo "Permisos de Sara: " . $gestor->mostrarPermisosUsuario("Sara") . "<br>";
echo "Permisos de Alonso: " . $gestor->mostrarPermisosUsuario("Alonso") . "<br>";

// Realizar acciones basadas en el rol
echo "Intentando realizar acción 'crear': " . $gestorSesion->realizarAccion("crear") . "<br>";
echo "Intentando realizar acción 'eliminar': " . $gestorSesion->realizarAccion("eliminar") . "<br>";
echo "Intentando realizar acción 'ver': " . $gestorSesion->realizarAccion("ver") . "<br>";