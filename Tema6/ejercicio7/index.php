<?php

class Estudiante
{
    private $nombre;
    private $edad;
    private $notas = [];

    // Atributos estáticos
    private static $contadorEstudiantes = 0;
    private static $sumaTotalPromedios = 0;

    // Constructor
    public function __construct($nombre, $edad)
    {
        if ($edad < 18) {
            throw new Exception("La edad debe ser mayor o igual a 18 años.");
        }
        $this->nombre = $nombre;
        $this->edad = $edad;
        self::$contadorEstudiantes++;
    }

    // Método para agregar una nota
    public function agregarNota($nota)
    {
        if (!is_numeric($nota) || $nota < 0 || $nota > 10) {
            throw new Exception("La nota debe ser un número entre 0 y 10.");
        }
        $this->notas[] = $nota;
    }

    // Método para calcular el promedio del estudiante
    public function calcularPromedio()
    {
        if (empty($this->notas)) {
            throw new Exception("No se puede calcular el promedio sin notas.");
        }
        $promedio = array_sum($this->notas) / count($this->notas);
        return $promedio;
    }

    // Método estático para calcular el promedio de un grupo de estudiantes
    public static function calcularPromedioGrupo($estudiantes)
    {
        if (empty($estudiantes)) {
            throw new Exception("No se puede calcular el promedio de un grupo vacío.");
        }

        $sumaPromedios = 0;
        foreach ($estudiantes as $estudiante) {
            if (!$estudiante instanceof Estudiante) {
                throw new Exception("Todos los elementos deben ser instancias de la clase Estudiante.");
            }
            $sumaPromedios += $estudiante->calcularPromedio();
        }

        return $sumaPromedios / count($estudiantes);
    }

    // Método estático para obtener el total de estudiantes creados
    public static function obtenerTotalEstudiantes()
    {
        return self::$contadorEstudiantes;
    }
}

// Ejemplo de uso:
try {
    $estudiante1 = new Estudiante("Juan", 20);
    $estudiante1->agregarNota(8);
    $estudiante1->agregarNota(9);

    $estudiante2 = new Estudiante("Ana", 22);
    $estudiante2->agregarNota(7);
    $estudiante2->agregarNota(9);
    $estudiante2->agregarNota(10);

    echo "Promedio de Juan: " . $estudiante1->calcularPromedio() . "<br>";
    echo "Promedio de Ana: " . $estudiante2->calcularPromedio() . "<br>";

    $promedioGrupo = Estudiante::calcularPromedioGrupo([$estudiante1, $estudiante2]);
    echo "Promedio del grupo: " . $promedioGrupo . "<br>";

    echo "Total de estudiantes: " . Estudiante::obtenerTotalEstudiantes() . "<br>";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}
