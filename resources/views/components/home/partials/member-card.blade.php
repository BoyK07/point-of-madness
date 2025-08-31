@props(['name', 'role', 'description', 'imagePath'])

<div class="relative w-full h-64 bg-gray-800 rounded-lg overflow-hidden shadow-lg shadow-gray-900/30">
    <!-- Background image that fills the entire card -->
    <img src="{{ $imagePath }}" alt="{{ $name }}" class="absolute inset-0 w-full h-full object-cover">

    <!-- Dark gradient overlay at the bottom for text readability -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>

    <!-- Text content positioned at the bottom -->
    <div class="absolute bottom-0 left-0 right-0 p-4">
        <h3 class="text-white text-xl font-semibold mb-1">{{ $name }}</h3>
        <p class="text-gray-200 text-sm mb-1">{{ $role }}</p>
        <p class="text-gray-300 text-xs">{{ $description }}</p>
    </div>
</div>
