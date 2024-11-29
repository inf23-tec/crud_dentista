<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar informacion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('paciente.actualizar', $paciente->id) }}" method="POST">
                        @csrf
                        <label for="nombre">Nombre:</label>
                        <input class="text-black" type="text" name="nombre" id="nombre" value="{{ old('nombre', $paciente->nombre) }}" required>
                        <br><br>

                        <label for="numero_telefono">Número de teléfono:</label>
                        <input class="text-black" type="text" name="numero_telefono" id="numero_telefono" value="{{ old('numero_telefono', $paciente->numero_telefono) }}" required>
                        <br><br>

                        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                        <input class="text-black" type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento) }}" required>
                        <br><br>

                        <button type="submit">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>