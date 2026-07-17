<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form method="POST" action="{{ route('users.store') }}">
                @csrf

                    <div class="mb-5">
                        <x-input-label for="name" :value="__('Nombre')" />
                        <x-text-input id="name" name="name" type="text" class="lowercase mt-1 block w-full" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="email" :value="__('Correo electrónico')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                      <x-input-label for="password" :value="__('Contraseña')" />
                      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                      <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
                      <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                    <x-cancel-link :href="route('users.index')">Cancelar</x-cancel-link>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>