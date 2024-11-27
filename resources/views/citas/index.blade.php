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
    </style>
</head>
<body>
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
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<!-- FIN de la tabla -->
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
