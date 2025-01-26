<h2>Listado de todos los doctores </h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Telefono</th>
        <th>Especialidad</th>
    </tr>
    <?php foreach ($doctores as $doctor): ?>
    <tr>
        <td><?= $doctor['id'] ?></td>
        <td><?= $doctor['nombre'] ?></td>
        <td><?= $doctor['apellidos'] ?></td>
        <td><?= $doctor['telefono'] ?></td>
        <td><?= $doctor['especialidad'] ?></td>
    </tr>
    <?php endforeach; ?>