<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Rol') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form method="POST" action="{{ route('roles.update', $role->id) }}" >
                @csrf
                @method('PUT')

                    <div class="mb-5">
                        <x-input-label for="name" :value="__('Nombre del rol')" />
                        <x-text-input id="name" name="name" type="text" class="lowercase mt-1 block w-full" :value="old('name', $role->name)" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="description" :value="__('Descripción')" />
                        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $role->description)" />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                    <x-cancel-link :href="route('roles.index')">Cancelar</x-cancel-link>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>