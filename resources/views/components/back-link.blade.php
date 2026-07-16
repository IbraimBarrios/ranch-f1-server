<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'inline-flex items-center px-4 py-2 bg-amber-500 dark:bg-amber-300 text-white dark:text-gray-900 rounded-md font-semibold text-xs tracking-widest hover:bg-amber-600 dark:hover:bg-amber-400 focus:bg-amber-600 dark:focus:bg-amber-400 active:bg-amber-700 dark:active:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition duration-150 ease-in-out'
    ]) }}
>
    {{ $slot }}
</a>