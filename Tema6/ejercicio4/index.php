<?php

// Intentar incluir el archivo perro.php
try {
    if (!file_exists('perro.php')) {
        throw new Exception('El archivo perro.php no existe.');
    }
    include 'perro.php';
} catch (Exception $e) {
    die($e->getMessage());
}

// Crear el objeto labrador y mostrar sus propiedades
$labrador = new Perro('Grande', 'Labrador', 'Amarillo', 'Max');
$labrador->mostrar_propiedades();
echo PHP_EOL;

// Hacer que el perro "hable"
$labrador->speak();
echo PHP_EOL;

// Crear el objeto caniche
$caniche = new Perro('Pequeño', 'Caniche', 'Blanco', 'Fifi');
$caniche->mostrar_propiedades();
echo PHP_EOL;

// Hacer que el caniche "hable"
$caniche->speak();
echo PHP_EOL;

// Intentar cambiar una propiedad con validación
$perro_error_message = $labrador->set_nombre('Luna');
echo $perro_error_message ? 'Nombre actualizado correctamente' : 'Nombre no modificado';
echo PHP_EOL;

// Intentar un nombre inválido
$perro_error_message = $labrador->set_nombre('NombreDemasiadoLargoParaSerValido');
echo $perro_error_message ? 'Nombre actualizado correctamente' : 'Nombre no modificado';
echo PHP_EOL;

// Crear una librería con más animales (ejemplo)
$chihuahua = new Perro('Muy pequeño', 'Chihuahua', 'Marrón', 'Taco');
$pastor_aleman = new Perro('Grande', 'Pastor Alemán', 'Negro y marrón', 'Rex');
$chihuahua->mostrar_propiedades();
echo PHP_EOL;
$pastor_aleman->mostrar_propiedades();
echo PHP_EOL;

?>
