<?php

// models/Monedero.php
class Monedero {
    private $registros = [];
    private $file = __DIR__ . '/../storage/monedero.txt';

    public function __construct() {
        if (file_exists($this->file)) {
            $this->cargarDatos();
        }
    }

    private function cargarDatos() {
        $contenido = file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($contenido as $linea) {
            list($fecha, $concepto, $importe) = explode('|', $linea);
            $this->registros[] = [
                'fecha' => $fecha,
                'concepto' => $concepto,
                'importe' => $importe
            ];
        }
    }

    public function obtenerRegistros() {
        return $this->registros;
    }

    public function agregarRegistro($fecha, $concepto, $importe) {
        if (empty($concepto)) {
            return "No se puede dar de alta el registro: es obligatorio introducir el concepto.";
        }
        if (!preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $fecha)) {
            return "No se puede dar de alta el registro: es obligatorio indicar una fecha correcta (formato d/m/aaaa).";
        }
        $nuevoRegistro = "$fecha|$concepto|$importe" . PHP_EOL;
        file_put_contents($this->file, $nuevoRegistro, FILE_APPEND);
        return true;
    }

    public function buscarRegistro($concepto) {
        return array_filter($this->registros, function ($registro) use ($concepto) {
            return stripos($registro['concepto'], $concepto) !== false;
        });
    }

    public function borrarRegistro($indice) {
        if (isset($this->registros[$indice])) {
            unset($this->registros[$indice]);
            $this->guardarDatos();
        }
    }

    public function editarRegistro($indice, $fecha, $concepto, $importe) {
        if (isset($this->registros[$indice])) {
            $this->registros[$indice] = [
                'fecha' => $fecha,
                'concepto' => $concepto,
                'importe' => $importe
            ];
            $this->guardarDatos();
        }
    }

    private function guardarDatos() {
        $contenido = "";
        foreach ($this->registros as $registro) {
            $contenido .= implode('|', $registro) . PHP_EOL;
        }
        file_put_contents($this->file, $contenido);
    }
}