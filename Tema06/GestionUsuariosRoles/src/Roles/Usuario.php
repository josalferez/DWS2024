<?php

namespace App\Roles;

use App\Roles\RolInterface;

class Usuario implements RolInterface{
    public function mostrarPermisos(): string
    {
        return "Permisos: Lectura";
    }
}