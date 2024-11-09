<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Profesores del centro</title>

</head>
<body>
    <?php
        function imprimeProfesores($profesores){
            foreach ($profesores as $valor) {
                echo "Clave: " . $valor['id'] . " - Nombre: " . $valor['Nombre'] . " " . $valor['Apellido'] . "<br>";
            }
        }

        
        $profesores = [ ['id'=>1, 'Nombre'=>'Jose','Apellido'=>'Alfrez', 'telefono' => '600111222', 'fecha_nacimiento' => '1985-06-15'],
                        ['id'=>2, 'Nombre'=>'Pedro','Apellido'=>'Gomez', 'telefono' => '600333444', 'fecha_nacimiento' => '1992-09-23'],
                        ['id'=>3, 'Nombre'=>'Ana','Apellido'=>'Alferez', 'telefono' => '600555666', 'fecha_nacimiento' => '1990-12-01']];
        imprimeProfesores($profesores);


        $verProfesores = function($profe) {
            echo "Identificador: " . $profe['id'] . " - Nombre: ". $profe['Nombre'] ."<br>";
        };

        echo "<br>";
        
        // Usamos array_map() para aplicar la función anónima a cada profesor
        array_map($verProfesores, $profesores);

        // Función anónima para filtrar profesores nacidos después de 1990
        $profesoresNacidosDespuesDe1990 = function($profesor) {
            // Fecha de nacimiento mínima: 1990-01-01
            $fecha_limite = strtotime('1990-01-01');
            $fecha_nacimiento_profesor = strtotime($profesor['fecha_nacimiento']);
            
            // Devolver solo si nació después de 1990
            return $fecha_nacimiento_profesor >= $fecha_limite;
        };

        // Usamos array_filter() para obtener los profesores que cumplen la condición
        $profesoresFiltrados = array_filter($profesores, $profesoresNacidosDespuesDe1990);

        // Imprimir los profesores filtrados
        foreach ($profesoresFiltrados as $profesor) {
            echo "Nombre: " . $profesor['Nombre'] . " " . $profesor['Apellido'] . " - Fecha de nacimiento: " . $profesor['fecha_nacimiento'] . "<br>";
        }
    ?>
</body>
</html>

