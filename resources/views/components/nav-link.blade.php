@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 py-2 mx-1 border-b-2 border-cyan-400 text-sm font-medium leading-5 text-cyan-400 text-cyan-400 focus:outline-none focus:border-cyan-300 transition duration-300 ease-in-out transform hover:scale-105'
            : 'inline-flex items-center px-4 py-2 mx-1 border-b-2 border-transparent text-sm font-medium leading-5 text-pink-300 hover:text-cyan-300 hover:border-pink-400 hover:text-pink-300 focus:outline-none focus:text-cyan-300 focus:border-pink-400 transition duration-300 ease-in-out transform hover:scale-105';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
