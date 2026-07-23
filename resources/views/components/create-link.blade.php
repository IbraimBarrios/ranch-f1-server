<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'inline-flex items-center px-4 py-2 bg-cyan-500 dark:bg-cyan-700 text-white text-xs font-bold rounded hover:bg-cyan-600 dark:hover:bg-cyan-800 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition duration-150 ease-in-out'
    ]) }}
>
    {{ $slot }}
</a>