@props([
    'type' => 'info',
    'message' => null,
])

@php
    $classes = match ($type) {
        'success' => 'bg-green-100 dark:bg-green-900 border-green-400 dark:border-green-700 text-green-700 dark:text-green-200',
        'error'   => 'bg-red-100 dark:bg-red-900 border-red-400 dark:border-red-700 text-red-700 dark:text-red-200',
        'warning' => 'bg-yellow-100 dark:bg-yellow-900 border-yellow-400 dark:border-yellow-700 text-yellow-700 dark:text-yellow-200',
        default   => 'bg-blue-100 dark:bg-blue-900 border-blue-400 dark:border-blue-700 text-blue-700 dark:text-blue-200',
    };
@endphp

@if ($message)
    <div {{ $attributes->merge(['class' => "mb-4 rounded-md border px-4 py-3 {$classes}"]) }}>
        {{ $message }}
    </div>
@endif