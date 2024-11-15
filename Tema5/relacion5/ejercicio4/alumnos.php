<?php
// Función para crear el array de alumnos
function crearArrayAlumnos() {
    return [
        "Marta" => 7.8,
        "Luis" => 5.0,
        "Lorena" => 6.9,
        "Pablo" => 8.2
    ];
}

// Función para mostrar el array ordenado
function mostrarAlumnos($alumnos) {
    // Ordenar el array por clave (nombre del alumno)
    //ksort($alumnos);
    
    // Ordenar el array por nota 
    arsort($alumnos);

    echo "<table border='1'>";
    echo "<tr><th>Alumno</th><th>Nota</th></tr>";
    foreach ($alumnos as $nombre => $nota) {
        echo "<tr><td>$nombre</td><td>$nota</td></tr>";
    }
    // Mostrar la media
    $media = calcularMedia($alumnos);
    echo "<tr><td colspan='2'><strong>Media:</strong> $media</td></tr>";
    echo "</table>";
}

// Función para agregar o actualizar un alumno
function agregarAlumno(&$alumnos, $nombre, $nota) {
    if (array_key_exists($nombre, $alumnos)) {
        echo "<p>El alumno '$nombre' ya existe. Su nota ha sido actualizada.</p>";
    } else {
        echo "<p>El alumno '$nombre' ha sido añadido.</p>";
    }
    $alumnos[$nombre] = $nota;
}

// Función para calcular la media de las notas
function calcularMedia($alumnos) {
    return array_sum($alumnos) / count($alumnos);
}

// Crear el array inicial de alumnos
$alumnos = crearArrayAlumnos();

// Mostrar el array inicial
mostrarAlumnos($alumnos);

// Manejar formulario para agregar alumnos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $nota = (float)$_POST['nota'];
    agregarAlumno($alumnos, $nombre, $nota);
    // Mostrar el array actualizado
    mostrarAlumnos($alumnos);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Tema5/css/estilos.css"> 
    <title>Document</title>
</head>
<body>
        <!-- Formulario HTML para añadir alumnos -->
    <form method="post">
        <label for="nombre">Nombre del Alumno:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="nota">Nota:</label>
        <input type="number" id="nota" name="nota" step="0.1" required> <!-- step solo permite un decimal en las notas -->
        <br><br>
        <input type="submit" value="Añadir Alumno">
    </form>
</body>
</html>


