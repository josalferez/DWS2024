<?php
// views/doctor/mostrar_todos.php

require_once __DIR__ . '/../partials/header.php';
?>
<h2>MIS DOCTORES</h2>
<?php
foreach ($todos_mis_doctores as $doctor) {
    foreach ($doctor as $campo => $valor) {
        echo "$campo: $valor <br><br>";
    }
}
?>
<?php
require_once __DIR__ . '/../partials/footer.php';
?>