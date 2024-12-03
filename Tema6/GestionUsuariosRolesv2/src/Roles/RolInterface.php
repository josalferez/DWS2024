<?php
namespace App\Roles;

interface RolInterface{
    public function mostrarPermisos(): string;
    public function realizarAccion(string $accion): string;
}

