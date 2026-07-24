<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Rancho') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form method="POST" action="{{ route('ranches.update', $ranch) }}" >
                @csrf
                @method('PUT')

                    <div class="mb-5">
                        <x-input-label for="name" :value="__('Nombre')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $ranch->name)" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="description" :value="__('Descripción')" />
                        <x-text-area id="description" name="description" rows="4" class="mt-1 block w-full" >{{ old('description', $ranch->description) }}</x-text-area>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="phone" :value="__('Teléfono')" />
                        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $ranch->phone)" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="address" :value="__('Dirección')" />
                        <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $ranch->address)" required />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="user_id" :value="__('Propietario o Administrador de rancho')" />
                        <select
                            id="user_id"
                            name="user_id"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"
                            required
                        >
                            <option value="">
                                Seleccione un propietario
                            </option>

                            @foreach ($owners as $owner)
                                <option
                                    value="{{ $owner->id }}"
                                    @selected(old('user_id', $ranch->user_id) == $owner->id)
                                >
                                    {{ $owner->name }}
                                </option>
                            @endforeach

                        </select>
                        <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="status" :value="__('Status')" />
                        <select
                            id="status"
                            name="status"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"
                            required
                        >
                            <option value="">
                                Seleccione un estado
                            </option>
                            <option value="active" @selected(old('status', $ranch->status) == 'active')>Activo</option>
                            <option value="inactive" @selected(old('status', $ranch->status) == 'inactive')>Inactivo</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                    <x-cancel-link :href="route('ranches.index')">Cancelar</x-cancel-link>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>