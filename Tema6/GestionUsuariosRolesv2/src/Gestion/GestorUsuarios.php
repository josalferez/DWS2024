<?php

namespace App\Gestion;

use App\Roles\RolInterface;

class GestorUsuarios{
    private $usuarios = [];

    public function agregarUsuarios(String $Nombre, RolInterface $rol) : void{
        $this->usuarios[$Nombre] = $rol;
    }

    public function mostrarPermisosUsuario(string $nombre): string {
        if (isset($this->usuarios[$nombre])){
            return $this->usuarios[$nombre]->mostrarPermisos();
        } else{
            return "Usuario no encontrado";
        }
    }

    public function ejecutarAccionUsuario(string $nombre, string $accion): string {
        if (isset($this->usuarios[$nombre])) {
            return $this->usuarios[$nombre]->realizarAccion($accion);
        }
        return "Usuario no encontrado.";
    }
}