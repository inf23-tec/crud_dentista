<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Paciente</title>
</head>
<body>
    <form action="{{ route('paciente.actualizar', $paciente->id) }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $paciente->nombre) }}" required>
        <br><br>

        <label for="numero_telefono">Número de teléfono:</label>
        <input type="text" name="numero_telefono" id="numero_telefono" value="{{ old('numero_telefono', $paciente->numero_telefono) }}" required>
        <br><br>

        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento) }}" required>
        <br><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>