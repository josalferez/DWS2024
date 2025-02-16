<?php
namespace App\Gestion;

use App\Roles\Administrador;
use App\Roles\Moderador;
use App\Roles\Usuario;

class GestorSesion {
    public function iniciarSesion(string $nombre, string $rol): void {
        session_start();
        $_SESSION['usuario'] = [
            'nombre' => $nombre,
            'rol' => $rol
        ];
        setcookie('usuario_rol', $rol, time() + (86400 * 7), "/"); // Cookie válida por 7 días
    }

    public function obtenerRolUsuario(): ?string {
        if (isset($_SESSION['usuario']['rol'])) {
            return $_SESSION['usuario']['rol'];
        } elseif (isset($_COOKIE['usuario_rol'])) {
            return $_COOKIE['usuario_rol'];
        }
        return null;
    }

    public function realizarAccion(string $accion): string {
        $rol = $this->obtenerRolUsuario();
        if ($rol === null) {
            return "No hay un usuario autenticado.";
        }

        // Instanciar la clase correspondiente al rol
        $instanciaRol = match ($rol) {
            'Administrador' => new Administrador(),
            'Moderador' => new Moderador(),
            'Usuario' => new Usuario(),
            default => null,
        };

        if ($instanciaRol) {
            return $instanciaRol->realizarAccion($accion);
        }

        return "Rol desconocido.";
    }
}
