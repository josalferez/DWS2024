<?php

namespace App\Roles;

use App\Roles\RolInterface;

class Usuario implements RolInterface{
    public function mostrarPermisos(): string
    {
        return "Permisos: Lectura";
    }
    
    public function realizarAccion(string $accion): string {
        if ($accion === 'ver') {
            return "Acción de visualización realizada.";
        }
        return "Acción no permitida para usuario.";
    }
}