<?php

include_once("models/autor.php");
include_once("view.php");

class AutoresController {
        // --------------------------------- MOSTRAR LISTA DE AUTORES ----------------------------------------
        public function mostrarListaAutores() {
            // Esto está sin desarrollar aún. De momento, llamaremos a una vista inexistente.
            View::render("autor/all");
        }   
}