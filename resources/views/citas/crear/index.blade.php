<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear cita</title>
</head>
<body>
<!-- Demas opciones del CRUD -->
<div>
    <form action="{{ route('citas.crear') }}" method="POST">
        @csrf
        <!-- Campo de ID del Cliente -->
        <label for="id_cliente">ID Cliente:</label>
        <input type="number" name="id_cliente" id="id_cliente" required>
        <br><br>

        <!-- Campo de Fecha -->
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" required>
        <br><br>

        <!-- Campo de Hora -->
        <label for="hora">Hora:</label>
        <input type="time" name="hora" id="hora" required>
        <br><br>

        <!-- Campo de Estado -->
        <label for="estado">Estado:</label>
        <select name="estado" id="estado" required>
            <option value="programada">Programada</option>
            <option value="completada">Completada</option>
            <option value="cancelada">Cancelada</option>
        </select>
        <br><br>

        <!-- Campo de Descripción -->
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" rows="4" cols="50" placeholder="Ingrese una descripción..."></textarea>
        <br><br>

        <!-- Botón para enviar -->
        <button type="submit">Crear Cita</button>
    </form>
</div>
</body>
</html>