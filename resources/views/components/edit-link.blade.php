<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'inline-flex items-center px-4 py-2 bg-violet-500 dark text-white rounded-md font-semibold text-xs tracking-widest hover dark:hover focus dark:focus active dark:active focus focus focus focus dark:focus transition duration-150 ease-in-out'
    ]) }}
>
    {{ $slot }}
</a>