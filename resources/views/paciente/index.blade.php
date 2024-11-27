<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paciente</title>
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
    <form action="{{ route('paciente.crear.index') }}" method="POST">
        @csrf
        <button type="submit">Crear</button>
    </form>
    <br><br>
</div>
<div>
    <!-- Tabla para mostrar los pacientes -->
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>N° de telefono</th>
            <th>Fecha de nacimiento</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->id }}</td>
                <td>{{ $paciente->nombre }}</td>
                <td>{{ $paciente->numero_telefono }}</td>
                <td>{{ $paciente->fecha_nacimiento }}</td>
                <td>
                    <form action="{{ route('paciente.eliminar', $paciente->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta cita?');">
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
</body> 
</html>