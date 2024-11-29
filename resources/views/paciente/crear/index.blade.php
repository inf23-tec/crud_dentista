<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agregar paciente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('paciente.crear') }}" method="POST">
                        @csrf
                        <!-- Campo de Fecha -->
                        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                        <input class="text-black" type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
                        <br><br>

                        <!-- Campo de Nombre -->   
                        <label for="nombre">Nombre:</label>
                        <input class="text-black" type="text" name="nombre" id="nombre" required>
                        <br><br>

                        <!-- Campo de Número de teléfono -->
                        <label for="numero_telefono">Número de teléfono:</label>
                        <input class="text-black" type="text" name="numero_telefono" id="numero_telefono" required>
                        <br><br>

                        <!-- Botón para enviar -->
                        <button type="submit">Crear usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>