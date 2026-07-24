<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'inline-flex items-center px-4 py-2 bg-orange-500 dark:bg-orange-300 text-white dark:text-gray-900 rounded-md font-semibold text-xs tracking-widest hover:bg-orange-600 dark:hover:bg-orange-400 focus:bg-orange-600 dark:focus:bg-orange-400 active:bg-orange-700 dark:active:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition duration-150 ease-in-out'
    ]) }}
>
    {{ $slot }}
</a>