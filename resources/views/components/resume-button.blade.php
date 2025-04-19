@props([
    'style' => 'primary', // primary, secondary, outline, text
    'size' => 'md', // sm, md, lg
    'class' => '',
])

@php
    $styles = [
        'primary' => 'bg-indigo-600 hover:bg-indigo-700 text-white shadow-md hover:shadow-lg',
        'secondary' => 'bg-purple-600 hover:bg-purple-700 text-white shadow-md hover:shadow-lg',
        'outline' => 'border border-indigo-500 text-indigo-400 hover:bg-indigo-500 hover:text-white',
        'text' => 'text-indigo-400 hover:text-indigo-300'
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm rounded-md',
        'md' => 'px-4 py-2 rounded-md',
        'lg' => 'px-6 py-3 text-lg rounded-lg'
    ];

    $baseClasses = 'inline-flex items-center justify-center transition-all duration-200 focus:outline-none';

    $combinedClasses = $baseClasses . ' ' . $styles[$style] . ' ' . $sizes[$size] . ' ' . $class;
@endphp

<a href="#resume" {{ $attributes->merge(['class' => $combinedClasses]) }}>
    {{ $slot->isEmpty() ? 'View Resume' : $slot }}
</a>
