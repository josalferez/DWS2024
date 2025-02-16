<?php 

namespace App\Roles;

use App\Roles\RolInterface;

class Moderador implements RolInterface {
    public function mostrarPermisos(): string
    {
        return "Permisos: Editar, Ver";
    }

    public function realizarAccion(string $accion): string {
        switch ($accion) {
            case 'editar':
                return "Acción de edición realizada.";
            case 'ver':
                return "Acción de visualización realizada.";
            default:
                return "Acción no permitida para moderador.";
        }
    }
}