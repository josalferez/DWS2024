<?php

// Intentar incluir el archivo perro.php
try {
    if (!file_exists('perro.php')) {
        throw new Exception('El archivo perro.php no existe.');
    }
    include 'perro.php'; // Si lanza la excepción no hace el include
} catch (Exception $e) {
    die($e->getMessage());
}

// Crear el objeto labrador y mostrar sus propiedades
$labrador = new Perro('Grande', 'Labrador', 'Amarillo', 'Max');
$labrador->mostrar_propiedades();
echo "<br>"; 

// Hacer que el perro "hable"
$labrador->speak();
echo "<br>";

// Crear el objeto caniche
$caniche = new Perro('Pequeño', 'Caniche', 'Blanco', 'Fifi');
$caniche->mostrar_propiedades();
echo "<br>";

// Hacer que el caniche "hable"
$caniche->speak();
echo "<br>";

// Intentar cambiar una propiedad con validación
$perro_error_message = $labrador->set_nombre('Bella');
echo $perro_error_message ? 'Nombre actualizado correctamente' : 'Nombre no modificado';
echo "<br>";

// Intentar un nombre inválido
$perro_error_message = $labrador->set_nombre('NombreDemasiadoLargoParaSerValido');
echo $perro_error_message ? 'Nombre actualizado correctamente' : 'Nombre no modificado';
echo "<br>";

// Crear una librería con más animales (ejemplo)
$chihuahua = new Perro('Muy pequeño', 'Chihuahua', 'Marrón', 'Taco');
$pastor_aleman = new Perro('Grande', 'Pastor Alemán', 'Negro y marrón', 'Rex');
$chihuahua->mostrar_propiedades();
echo "<br>";
$pastor_aleman->mostrar_propiedades();
echo "<br>";

?>
