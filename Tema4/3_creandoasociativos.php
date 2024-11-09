<?php
// Arrays asociativos :arrays con índices que son alfanuméricos
$personas = array(
    'nombre' => 'Belén',
    'apellidos' => 'Callejón Prieto',
    'web' => 'belen.es'
);
var_dump($personas);
echo "Esta persona se llama:  ".$personas['nombre']."<hr/>";

// otro ejemplo de array asociativo
$arr2 = array (
		"1111A" => "Juan Vera Ochoa",
		"1112A" => "Maria Mesa Cabeza",
		"1113A" => "Ana Puertas Peral"
	);	
// modificamos un elemento del array
	$arr2["1113A"] = "Ana Puertas Segundo";
// Mostramos todos los elementos de este array
        echo "Lista de personas: <br>";
        foreach ($arr2 as $nombre){
            echo "$nombre <br>";
        }
        echo "<hr/> Lista de personas con su código: <br>";
        foreach ($arr2 as $codigo => $nombre){
            echo "Código:  $codigo -  Nombre:  $nombre <br>";
        }
/* OJO: los parámetros que van por GET y por POST
 *  son también arrays asociativos
 */


 $jugadores = [
    'Jugador 1' => ['Nombre' => 'Jose', 'Apellido' => 'Alferez'],
    'Jugador 2' => ['Nombre' => 'Alejandro', 'Apellido' => 'Prieto'],
 ];


  foreach ($jugadores as $jugador => $valor) {
    echo " <hr/>" . $valor['Nombre'] . " " . $valor['Apellido'];     
 }

 $jugadores['Jugador 2']['Nombre'] = 'Pedro';

 foreach ($jugadores as $jugador => $valor) {
    echo " <hr/>" . $valor['Nombre'] . " " . $valor['Apellido'];     
 }

 $palos = ["oros","copas","bastos","espadas"];
 $valores = range(1,12);
 $baraja = [];

echo $palos[0];
echo $valores[0];

foreach ($palos as $palo)
 foreach ($valores as $valor) {
    $baraja[] = ['palo' => $palo,'valor' => $valor];
 }

 function imprimeBaraja($baraja){
    $ruta = 'imagenesCartas/';
    foreach ($baraja as $key => $valor) {
        $archivoImagen = $ruta . $valor['palo'] . '_' . $valor['valor'] . '.jpg';
        echo "<img src='$archivoImagen' width='80' height='120'>";
    }
 }

 imprimeBaraja($baraja);

 shuffle($baraja);

 echo "<br> Baraja barajada";
 imprimeBaraja($baraja);










