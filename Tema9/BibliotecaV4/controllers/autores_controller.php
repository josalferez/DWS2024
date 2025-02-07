<?php

include_once("models/persona.php");
include_once("view.php");

class AutoresController {
        // --------------------------------- MOSTRAR LISTA DE AUTORES ----------------------------------------
        public function mostrarListaAutores() {
            // Esto está sin desarrollar aún. De momento, llamaremos a una vista inexistente.
            View::render("persona/all");
        }   
}