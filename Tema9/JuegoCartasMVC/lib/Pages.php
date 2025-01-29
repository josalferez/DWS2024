<?php
namespace Lib;

class Pages {
    public function render(string $view, array $data = []): void {
        extract($data); // Makes variables accessible in the view
        require_once "Views/{$view}.php"; // Adjust path as needed
    }
}