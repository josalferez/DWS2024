<?php

namespace App\Roles;

use App\Roles\RolInterface;

class Administrador implements RolInterface{
    public function mostrarPermisos(): string
    {
        return "Permisos: Crear, Eliminar, Ver, Editar";
    }

    public function realizarAccion(string $accion): string {
        switch ($accion) {
            case 'crear':
                return "Acción de creación realizada.";
            case 'editar':
                return "Acción de edición realizada.";
            case 'eliminar':
                return "Acción de eliminación realizada.";
            case 'ver':
                return "Acción de visualización realizada.";
            default:
                return "Acción desconocida.";
        }
    }
}