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
            width: 100px;
            height: 25px;
        }
    </style>
</head>
<body>
<div>
    <form action="{{ route('paciente.crear.index') }}" method="POST">
        @csrf
        <button type="submit">Crear usuario</button>
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
                    <div style="display: flex; gap: 10px">
                        <form action="{{ route('paciente.eliminar', $paciente->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta cita?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                        <a href=""></a>
                        <form action="{{ route('paciente.editar.index', $paciente->id) }}", method="POST">
                            @csrf
                            <button type="submit">Editar</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br><br>
</div>
<div>
    @if ($pacientes->count() > 0)
        <form action="{{ route('citas.crear.index') }}" method="POST">
            @csrf
            <button type="submit">Crear cita</button>
        </form>
    @endif
</div>
</body> 
</html>