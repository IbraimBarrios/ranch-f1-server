<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form method="POST" action="{{ route('profile.store', $user) }}">
                @csrf

                    <div class="mb-5">
                        <x-input-label for="first_name" :value="__('Nombres')" />
                        <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name')" required autofocus />
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="last_name" :value="__('Apellido Paterno')" />
                        <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name')" required />
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="second_last_name" :value="__('Apellido Materno')" />
                        <x-text-input id="second_last_name" name="second_last_name" type="text" class="mt-1 block w-full" :value="old('second_last_name')" />
                        <x-input-error :messages="$errors->get('second_last_name')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="phone" :value="__('Teléfono')" />
                        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone')" required />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="birth_date" :value="__('Fecha de Nacimiento')" />
                        <x-text-input id="birth_date" name="birth_date" type="date" class="mt-1 block w-full" :value="old('birth_date')" required />
                        <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="address" :value="__('Dirección')" />
                        <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address')" required />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                    <x-cancel-link :href="route('profile.show', $user)">Cancelar</x-cancel-link>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>