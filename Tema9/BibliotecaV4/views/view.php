<?php

// PLANTILLA DE LAS VISTAS
// view.php

namespace Views;

class View {
    public static function render($nombreVista, $data = null) {
        require_once("views/header.php");
        require_once("views/nav.php");
        require_once("views/$nombreVista.php");
        require_once("views/footer.php");
    }
}   