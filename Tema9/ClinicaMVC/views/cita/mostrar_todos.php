<h2> Listo todas las citas </h2>
<table border="1">
    <tr>
        <th> ID </th>
        <th> Paciente ID </th>
        <th> Doctor ID </th>
        <th> Fecha </th>
        <th> Hora </th>
    </tr>
    <?php foreach ($citas as $cita): ?>
    <tr>
        <td> <?= $cita['id'] ?> </td>
        <td> <?= $cita['paciente_id'] ?> </td>
        <td> <?= $cita['doctor_id'] ?> </td>
        <td> <?= $cita['fecha'] ?> </td>
        <td> <?= $cita['hora'] ?> </td>
    </tr>
    <?php endforeach; ?>