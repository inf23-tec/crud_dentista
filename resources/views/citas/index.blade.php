<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cliente</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        button {
            width: 60px;
            height: 25px;
        }
    </style>
</head>
<body>
<div>
    <form action="{{ route('citas.crear') }}" method="POST">
        @csrf
        <button type="submit">Crear</button>
    </form>
    <br><br>
</div>
<div>
    <!-- Tabla para mostrar las citas -->
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>ID del Cliente</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Fecha de ultima actualización</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($citas as $cita)
            <tr>
                <td>{{ $cita->id }}</td>
                <td>{{ $cita->id_cliente }}</td>
                <td>{{ $cita->fecha }}</td>
                <td>{{ $cita->hora }}</td>
                <td>{{ $cita->creado_el }}</td>
                <td>
                    <form action="{{ route('citas.eliminar', $cita->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta cita?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<!-- FIN de la tabla -->
</body>
</html>
