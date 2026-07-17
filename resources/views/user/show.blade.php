<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mostrar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="flex justify-end">
                    <x-back-link :href="route('users.index')">Regresar</x-back-link>
                </div>
              <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                  <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">
                      Detalle del Usuario
                  </h2>
              </div>
              <div class="p-6">
                <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-3 py-4">
                        <dt class="font-semibold text-gray-600 dark:text-gray-300">
                            ID
                        </dt>

                        <dd class="md:col-span-2 text-gray-900 dark:text-white">
                            {{ $user->id }}
                        </dd>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 py-4">
                        <dt class="font-semibold text-gray-600 dark:text-gray-300">
                            Nombre
                        </dt>

                        <dd class="md:col-span-2 text-gray-900 dark:text-white">
                            {{ $user->name }}
                        </dd>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 py-4">
                        <dt class="font-semibold text-gray-600 dark:text-gray-300">
                            Correo electrónico
                        </dt>

                        <dd class="md:col-span-2 text-gray-900 dark:text-white">
                            {{ $user->email }}
                        </dd>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 py-4">
                        <dt class="font-semibold text-gray-600 dark:text-gray-300">
                            Status
                        </dt>

                        <dd class="md:col-span-2 text-gray-900 dark:text-white">
                            {{ $user->status }}
                        </dd>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 py-4">
                        <dt class="font-semibold text-gray-600 dark:text-gray-300">
                            Usuario
                        </dt>

                        <dd class="md:col-span-2 text-gray-900 dark:text-white">
                            {{ $user->role->name }}
                        </dd>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 py-4">
                        <dt class="font-semibold text-gray-600 dark:text-gray-300">
                            Fecha de creación
                        </dt>

                        <dd class="md:col-span-2 text-gray-900 dark:text-white">
                            {{ $user->created_at->format('d/m/Y H:i') }}
                        </dd>
                    </div>
                </dl>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>