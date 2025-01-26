<h2>Listado de Pacientes</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Correo</th>
    </tr>
    <?php foreach ($pacientes as $paciente): ?>
    <tr>
        <td><?= $paciente['id'] ?></td>
        <td><?= $paciente['nombre'] ?></td>
        <td><?= $paciente['apellidos'] ?></td>
        <td><?= $paciente['correo'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>