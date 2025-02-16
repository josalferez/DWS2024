<?php
// CONTROLADOR DE AUTORES

namespace Controllers;

use Views\View;

class AutoresController {
        // --------------------------------- MOSTRAR LISTA DE AUTORES ----------------------------------------
        public function mostrarListaAutores() {
            // Esto está sin desarrollar aún. De momento, llamaremos a una vista inexistente.
            View::render("persona/all");
        }   
}