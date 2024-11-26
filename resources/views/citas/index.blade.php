<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cliente</title>
</head>
<body>
<!-- Tabla para mostrar las citas -->
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Fecha</th>
    </tr>
    </thead>
    <tbody>
    @foreach($citas as $cita)
        <tr>
            <td>{{ $cita->id_cliente }}</td>
            <td>{{ $cita->nombre }}</td>
            <td>{{ $cita->telefono }}</td>
            <td>{{ $cita->fecha }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<!-- FIN de la tabla -->
</body>
</html>
