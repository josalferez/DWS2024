<?php
// views/paciente/mostrar_todos.php
?>

<h2>MIS PACIENTES</h2>
<?php
foreach ($todos_mis_pacientes as $paciente) {
    foreach ($paciente as $campo => $valor) {
        echo "$campo: $valor <br><br>";
    }
}
