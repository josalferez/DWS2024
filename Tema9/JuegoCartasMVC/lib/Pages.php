<?php
namespace Lib;

class Pages {
    public function render(string $view, array $data = []): void {
        extract($data);
        require_once "views/$view.php";
    }
}
