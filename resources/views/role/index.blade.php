<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <div class="mb-4">
                        <a href="{{ route('roles.create') }}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Crear rol</a>
                    </div>
                    @if ($roles->isNotEmpty())
                    <table class="w-full table-auto">
                        <thead class="hidden md:table-header-group bg-gray-100 dark:bg-gray-800">
                            <tr>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Rol</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Descripción</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Acciones</th>
                            </tr>
                        </thead>
    
                        <tbody class="grid grid-cols-1 gap-4 md:table-row-group">
                            @foreach($roles as $role)
                            <tr class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-4 grid grid-cols-1 md:table-row md:border-b">
                                <td class="px-4 py-2 text-gray-900 dark:text-white flex justify-between md:table-cell border-b border-gray-100 dark:border-gray-800 md:border-none md:text-center">
                                    <span class="font-bold text-md text-gray-500 dark:text-gray-400 md:hidden">ID</span>
                                    <span>{{ $role->id }}</span>
                                </td>

                                <td class="px-4 py-2 text-gray-900 dark:text-white flex justify-between md:table-cell border-b border-gray-100 dark:border-gray-800 md:border-none md:text-center">
                                    <span class="font-bold text-md text-gray-500 dark:text-gray-400 md:hidden">Rol</span>
                                    <span>{{ $role->name }}</span>
                                </td>

                                <td class="px-4 py-2 text-gray-900 dark:text-white flex justify-between md:table-cell border-b border-gray-100 dark:border-gray-800 md:border-none md:text-center">
                                    <span class="font-bold text-md text-gray-500 dark:text-gray-400 md:hidden">Descripción</span>
                                    <span>{{ $role->description }}</span>
                                </td>

                                <td class="px-4 py-3 md:py-2 flex flex-col md:table-cell md:text-center">
                                    <span class="font-bold text-md text-gray-500 dark:text-gray-400 md:hidden mb-2">Acciones</span>
                                    
                                    <div class="flex flex-wrap gap-2 justify-start md:justify-center">
                                        <a href="{{ route('roles.show', $role->id) }}" class="bg-green-500 dark:bg-green-700 hover:bg-green-600 dark:hover:bg-green-800 text-white font-bold py-2 px-4 rounded text-center text-sm">
                                            Ver
                                        </a>
                                        <a href="{{ route('roles.edit', $role->id) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded text-center text-sm">
                                            Editar
                                        </a>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button 
                                                class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded text-sm w-full md:w-auto"
                                                type="submit"
                                                onclick="return confirm('¿Quieres eliminar este rol?')"
                                            >
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    {{ __("Sin roles") }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>