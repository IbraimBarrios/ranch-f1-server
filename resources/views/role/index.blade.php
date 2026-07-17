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
                    <table class="table-responsive">
                        <thead class="table-head">
                            <tr>
                                <th class="table-header-cell">ID</th>
                                <th class="table-header-cell">Rol</th>
                                <th class="table-header-cell">Descripción</th>
                                <th class="table-header-cell">Acciones</th>
                            </tr>
                        </thead>
    
                        <tbody class="table-body">
                            @foreach($roles as $role)
                            <tr class="table-row">
                                <td class="rf-table-cell flex justify-between md:table-cell md:border-none md:text-center">
                                    <span class="table-mobile-label">ID</span>
                                    <span>{{ $role->id }}</span>
                                </td>

                                <td class="rf-table-cell flex justify-between md:table-cell md:border-none md:text-center">
                                    <span class="table-mobile-label">Rol</span>
                                    <span>{{ $role->name }}</span>
                                </td>

                                <td class="rf-table-cell flex justify-between md:table-cell md:border-none md:text-center">
                                    <span class="table-mobile-label">Descripción</span>
                                    <span>{{ $role->description }}</span>
                                </td>

                                <td class="table-cell-actions">
                                    <span class="table-mobile-label mb-2">Acciones</span>
                                    
                                    <div class="table-actions">
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