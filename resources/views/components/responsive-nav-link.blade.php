@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-3 border-l-4 border-cyan-400 text-start text-base font-medium text-cyan-400 bg-purple-900/30 neon-cyan focus:outline-none focus:text-cyan-300 focus:bg-purple-900/50 focus:border-cyan-300 transition duration-300 ease-in-out'
            : 'block w-full ps-3 pe-4 py-3 border-l-4 border-transparent text-start text-base font-medium text-pink-300 hover:text-cyan-300 hover:bg-purple-900/20 hover:border-pink-400 hover:neon-pink focus:outline-none focus:text-cyan-300 focus:bg-purple-900/30 focus:border-pink-400 transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
