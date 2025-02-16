<?php
namespace Lib;

class Pages {
    public function render(string $view, array $data = []): void {
        extract($data); // Convierte las claves de un array asociativo en variables
        require_once "views/$view.php";    
    }
}
