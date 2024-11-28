<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear cita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('citas.crear') }}" method="POST">
                        @csrf
                        <!-- Campo de ID del Cliente -->
                        <label for="id_cliente">ID Cliente:</label>
                        <input type="number" name="id_cliente" id="id_cliente" required>
                        <br><br>
                        
                        <!-- Campo de ID del Dentista -->
                        <label for="id_cliente">ID Dentista:</label>
                        <input type="number" name="id_dentista" id="id_dentista" required>
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

                        <!-- Botón para enviar -->
                        <button type="submit">Crear Cita</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>