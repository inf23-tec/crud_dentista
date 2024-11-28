<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pacientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('paciente.crear.index') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Crear</button>
                </form>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                N° de Teléfono
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha de nacimiento
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            @foreach ($pacientes as $paciente)
                            <td class="px-6 py-4">
                                {{ $paciente->id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $paciente->nombre }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $paciente->numero_telefono }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $paciente->fecha_nacimiento }}
                            </td>
                            <td class="px-6 py-4">
                                <div style="display: flex; gap: 10px">
                                    <form action="{{ route('paciente.eliminar', $paciente->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta cita?');">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Eliminar</button>
                                    </form>
                                    <a href=""></a>
                                    <form action="{{ route('paciente.editar.index', $paciente->id) }}", method="POST">
                                        @csrf
                                            <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Editar</button>
                                    </form>
                                    @if ($pacientes->count() > 0)
                                        <form action="{{ route('citas.crear.index') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Crear cita</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>