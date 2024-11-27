<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear usuario</title>
</head>
<body>
<!-- Demas opciones del CRUD -->
<div>
    <form action="{{ route('paciente.crear') }}" method="POST">
        @csrf
        <!-- Campo de Fecha -->
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
        <br><br>

        <!-- Campo de Nombre -->   
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>

        <!-- Campo de Número de teléfono -->
        <label for="numero_telefono">Número de teléfono:</label>
        <input type="text" name="numero_telefono" id="numero_telefono" required>
        <br><br>

        <!-- Botón para enviar -->
        <button type="submit">Crear usuario</button>
    </form>
</div>
</body>
</html>