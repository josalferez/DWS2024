<?php

function formularioVacio(): bool
{
    if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["email"]))
        return true;
    else
        return false;
};

function guardarContacto($nombre, $apellido, $email)
{
    $fichero = "contactos.txt";
    $ficheroAbierto = fopen($fichero, "a");
    fwrite($ficheroAbierto, $nombre . ";" . $apellido . ";" . $email . "\n");
    fclose($ficheroAbierto);
    echo "El usuario {$nombre} {$apellido} con email {$email} ha sido añadido correctamente";
    echo "
    <script>
        setTimeout(function(){
            window.location.href = 'index.php';
        }, 2000);
    </script>";
};
