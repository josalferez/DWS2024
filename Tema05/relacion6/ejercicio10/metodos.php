<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .button2 {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }

        .button2:hover {
            background-color: #3e8e41
        }

        .button2:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        .button3 {
            font-size: 12px;
            font-weight: bold;
            position: relative;
            padding: 8px 16px;
            color: #fff;
            border: none;
            border-radius: 6px;
            background: black;
            cursor: pointer;
            display: block;
            /*Con esta línea y la de abajo centro el botón display: flex; tb valdría */
            margin: 20px auto;
        }

        .button3::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg,
                    red, blue, deeppink, blue, red, blue, deeppink, blue);
            background-size: 800%;
            border-radius: 10px;
            filter: blur(8px);
            animation: glowing 20s linear infinite
        }
    </style>
</head>

<body>

</body>

</html>
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
