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
                    <form action="{{ route('citas.almacenar', $id) }}" method="POST">
                        @csrf
                        <!-- Campo del Dentista -->
                        <label for="id_dentista">Dentista:</label>
                        <select class="text-black" name="id_dentista" id="id_dentista" required>
                            @foreach ($dentistas as $dentista)
                                <option value="{{ $dentista->id }}">{{ $dentista->nombre }}</option>
                            @endforeach
                        </select>
                        <br><br>

                        <!-- Campo de Fecha -->
                        <label for="fecha">Fecha:</label>
                        <input class="text-black" type="date" name="fecha" id="fecha" required>
                        <br><br>

                        <!-- Campo de Hora -->
                        <label for="hora">Hora:</label>
                        <input class="text-black" type="time" name="hora" id="hora" required>
                        <br><br>

                        <!-- Campo de Estado -->
                        <label for="estado">Estado:</label>
                        <select class="text-black" name="estado" id="estado" required>
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