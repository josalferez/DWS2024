<?php 

// Creo la cookie
$contador = 'contador';

if (isset($_COOKIE[$contador])){
    $valor = $_COOKIE[$contador] + 1;
} else {
    $valor = 1;
}

setcookie($contador,$valor,time()+36000);

//echo "Esta es tu visita número {$valor}";
switch ($valor) {
    case 1:
        echo "Bienvenido por primera vez";
        break;
    
    default:
        echo "Lo que sea";
        break;
}

//Elimino la cookie 
setcookie($contador,$valor,time()-1);