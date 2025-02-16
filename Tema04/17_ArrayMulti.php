<?php
// Array de productos (el que proporcionaste)
$productos = [
    ["nombre" => "Televisor", "precio" => 400, "stock" => 10],
    ["nombre" => "Televisor Sony", "precio" => 350, "stock" => 15],
    ["nombre" => "Televisor Xiaomi", "precio" => 475, "stock" => 25],
    ["nombre" => "Portátil", "precio" => 800, "stock" => 5],
    ["nombre" => "Smartphone", "precio" => 300, "stock" => 20],
];


// Muestro los productos
function mostrarProductos($productos){
    foreach ($productos as $key => $valor) {
        echo "<br> - {$valor['nombre']} vale {$valor['precio']} euros y disponemos de {$valor['stock']} unidades.";
    }
}

echo "<h1>PRODUCTOS: </h1>";
mostrarProductos($productos);

// Función de comparación para ordenar por nombre y luego por stock
function compararProductos($a, $b) {
    // Comparar por nombre (orden ascendente)
    if ($a["nombre"] < $b["nombre"]) {
        return -1;
    } elseif ($a["nombre"] > $b["nombre"]) {
        return 1;
    } else {
        // Si los nombres son iguales, comparar por stock (orden ascendente)
        return $a["stock"] - $b["stock"];
    }
}

// Ordenar el array usando usort() y la función de comparación
usort($productos, "compararProductos");

// Buscar si el producto "Televisor" existe
$existeTelevisor = in_array("Televisor", array_column($productos, 'nombre'));
if ($existeTelevisor) {
    echo "El producto 'Televisor' existe en la lista.\n";
} else {
    echo "El producto 'Televisor' no existe en la lista.\n";
}

// Calcular el valor total de todos los productos en stock
$valorTotal = 0;
foreach ($productos as $producto) {
    $valorTotal += $producto["precio"] * $producto["stock"];
}

echo "<h1>VALOR DEL STOCK DE LA TIENDA: </h1>";
echo "<br> <h2> El valor total de todos los productos en stock es: " . number_format($valorTotal, 2, ',', '.') . " euros \n";