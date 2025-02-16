<?php


// 1. Array de usuarios
$usuarios = [
    'jdoe' => [
        'contraseña' => '1234',
        'nombre' => 'John',
        'apellido1' => 'Doe',
        'apellido2' => 'Smith',
        'edad' => 30,
        'fechaAlta' => '2020-05-12'
    ],
    'asmith' => [
        'contraseña' => 'securepass',
        'nombre' => 'Alice',
        'apellido1' => 'Smith',
        'apellido2' => 'Brown',
        'edad' => 25,
        'fechaAlta' => '2019-03-22'
    ],
    'mbrown' => [
        'contraseña' => 'mypassword',
        'nombre' => 'Michael',
        'apellido1' => 'Brown',
        'apellido2' => 'Johnson',
        'edad' => 35,
        'fechaAlta' => '2021-08-17'
    ]
];

// 2. Array de libros
$libros = [
    '9781234567897' => [
        'unidades' => 5,
        'titulo' => 'Don Quijote',
        'editorial' => 'Editorial Cervantes',
        'año' => 1605,
        'autores' => [
            ['nombre' => 'Miguel', 'apellido1' => 'de Cervantes', 'apellido2' => 'Saavedra']
        ]
    ],
    '9789876543210' => [
        'unidades' => 3,
        'titulo' => 'Cien Años de Soledad',
        'editorial' => 'Editorial Sudamericana',
        'año' => 1967,
        'autores' => [
            ['nombre' => 'Gabriel', 'apellido1' => 'García', 'apellido2' => 'Márquez']
        ]
    ],
    '9781111111111' => [
        'unidades' => 2,
        'titulo' => 'El Principito',
        'editorial' => 'Editorial Reynal & Hitchcock',
        'año' => 1943,
        'autores' => [
            ['nombre' => 'Antoine', 'apellido1' => 'de Saint', 'apellido2' => 'Exupéry']
        ]
    ],
    '9782222222222' => [
        'unidades' => 4,
        'titulo' => '1984',
        'editorial' => 'Secker & Warburg',
        'año' => 1949,
        'autores' => [
            ['nombre' => 'George', 'apellido1' => 'Orwell', 'apellido2' => '']
        ]
    ]
];

// 3. Array de Préstamos
$prestamos = [
    [
        'isbn' => '9781234567897',
        'usuario' => 'jdoe',
        'fechaInicio' => '2023-01-01',
        'fechaFin' => '2023-02-01'
    ],
    [
        'isbn' => '9789876543210',
        'usuario' => 'asmith',
        'fechaInicio' => '2023-03-15',
        'fechaFin' => '2023-04-15'
    ],
    [
        'isbn' => '9781111111111',
        'usuario' => 'mbrown',
        'fechaInicio' => '2022-12-10',
        'fechaFin' => '2023-01-10'
    ]
];

// 4. Compruebo que $usu y $pw están en la base de datos usuarios. Si no están lanzo la excepción
// Si están, lo devuelvo con el return

function login($usu, $pw) {
    global $usuarios;
    if (empty($pw)) {
        throw new Exception("ERROR DEL SISTEMA: La contraseña no puede estar vacía.");
    }
    return isset($usuarios[$usu]) && $usuarios[$usu]['contraseña'] === $pw;
}

// 5. Si el usuario no existe lanzo una excepción. 
// Si existe, lo imprimo. 
function escribeUsuario($usu) {
    global $usuarios;
    if (!isset($usuarios[$usu])) {
        throw new Exception("ERROR DEL SISTEMA: El usuario no existe");
    }
    $user = $usuarios[$usu];
    echo "{$user['apellido1']} {$user['apellido2']}, {$user['nombre']} ({$user['edad']} años)<br>";
    echo "Está con nosotros desde el " . date("d de F de Y", strtotime($user['fechaAlta'])) . "<br><br>";
}

// 6. Si el usuario no existe lanzo una excepción. 
function escribePrestamos($usu) {
    global $prestamos, $libros, $usuarios;
    if (!isset($usuarios[$usu])) {
        throw new Exception("ERROR DEL SISTEMA: El usuario no existe");
    }
    echo "Préstamos realizados por {$usuarios[$usu]['nombre']}<br>";
    echo "<table border='1'>";
// 7. Imprimo todos los prestamos del usuario en una tabla
    echo "<tr><th>ISBN</th><th>Título</th><th>Fecha de inicio</th><th>Fecha de Fin</th><th>Retrasado</th></tr>";
    foreach ($prestamos as $prestamo) {
        if ($prestamo['usuario'] === $usu) {
            $isbn = $prestamo['isbn'];
            $titulo = $libros[$isbn]['titulo'];
            $fechaInicio = date("d-m-Y", strtotime($prestamo['fechaInicio']));
            $fechaFin = date("d-m-Y", strtotime($prestamo['fechaFin']));
// 8. Si la fecha de hoy es mayor que la fecha de fin de prestamo entonces marco retrasado como 'No'
// ¡Ojo a la forma de hacer la condición! 
            $retrasado = (strtotime($prestamo['fechaFin']) < time()) ? 'SI' : 'NO';
            echo "<tr><td>$isbn</td><td>$titulo</td><td>$fechaInicio</td><td>$fechaFin</td><td>$retrasado</td></tr>";
        }
    }
    echo "</table>";
}
?>
