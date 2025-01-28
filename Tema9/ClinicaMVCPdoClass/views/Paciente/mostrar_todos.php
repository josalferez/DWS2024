<?php
// views/paciente/mostrar_todos.php

require_once __DIR__ . '/../partials/header.php';
?>
<h2>MIS PACIENTES</h2>
<?php
foreach ($todos_mis_pacientes as $paciente) {
    foreach ($paciente as $campo => $valor) {
        echo "$campo: $valor <br><br>";
    }
}
?>
<?php
require_once __DIR__ . '/../partials/footer.php';
?>