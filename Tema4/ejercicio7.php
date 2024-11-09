<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Variables del Servidor</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 2px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Información del servidor</h2>
    <table>
        <thead>
            <tr>
                <th>Variable</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Recorre el array $_SERVER para mostrar las variables y sus valores
                foreach ($_SERVER as $kindice => $valor) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($kindice) . "</td>";
                    echo "<td>" . htmlspecialchars($valor) . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>

