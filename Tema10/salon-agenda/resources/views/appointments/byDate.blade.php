<h1>Citas del {{ $date }}</h1>
<table>
    <thead>
        <tr>
            <th>Hora</th>
            <th>Descripción</th>
            <th>Cliente</th>
            <th>Empleado que creó</th>
            <th>Empleado que atendió</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appointments as $appointment)
            <tr>
                <td>{{ $appointment->time }}</td>
                <td>{{ $appointment->description }}</td>
                <td>{{ $appointment->client->name }} {{ $appointment->client->surname }}</td>
                <td>{{ $appointment->createdByEmployee->name }}</td>
                <td>{{ $appointment->attendedByEmployee ? $appointment->attendedByEmployee->name : 'No asignado' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>