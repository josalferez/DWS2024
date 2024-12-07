<?php

require_once 'src/Roles/RolInterface.php';
require_once 'src/Roles/Administrador.php';
require_once 'src/Roles/Moderador.php';
require_once 'src/Roles/Usuario.php';
require_once 'src/Gestion/GestorUsuarios.php';

use App\Roles\Administrador;
use App\Roles\Moderador;
use App\Roles\Usuario;
use App\Gestion\GestorUsuarios;

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

// Ejecutar acciones de los usuarios
echo "<br>";
echo "Juan intenta crear: " . $gestor->ejecutarAccionUsuario("Jose", "crear") . "<br>";
echo "Carlos intenta eliminar: " . $gestor->ejecutarAccionUsuario("Sara", "eliminar") . "<br>";
echo "Ana intenta editar: " . $gestor->ejecutarAccionUsuario("Alonso", "editar") . "<br>";