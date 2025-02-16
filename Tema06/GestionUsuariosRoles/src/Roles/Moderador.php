<?php 

namespace App\Roles;

use App\Roles\RolInterface;

class Moderador implements RolInterface {
    public function mostrarPermisos(): string
    {
        return "Permisos: Editar, Ver";
    }
}