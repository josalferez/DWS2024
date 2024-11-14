<?php
	$contenido = file_get_contents("../ejercicio3/matriz.txt");
	echo "Contenido del fichero: $contenido<br>";
	$res = file_put_contents("fichero_salida.txt", "Fichero creado con file_put_contents".$contenido);
	if($res){
		echo "Fichero creado con éxito";
	}else{
		echo "Error al crear el fichero";
	}
?>