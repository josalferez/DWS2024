<?php
	$fich = fopen("matriz.txt", "r");
	if ($fich === False){
		echo "No se encuentra el fichero o no se pudo leer<br>";
	}else{
		while( !feof($fich) ){
			$num = fscanf($fich, "%d %d %d %d");
			echo "$num[0] $num[1] $num[2] $num[3] <br>";
		}
	}
    echo "<br>";

	rewind($fich);
	while( !feof($fich) ){
			fscanf($fich, "%d %d %d %d", $num1, $num2, $num3, $num4 ); // No devuelvo el array porque no lo voy a usar
			echo "$num1 $num2 $num3 $num4 <br>";
		}
	fclose($fich);
?>