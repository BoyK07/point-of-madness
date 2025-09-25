@props(['style' => 'default'])

<div>
    @if ($style == 'default')
        <button {{ $attributes->class('group relative px-8 py-4 bg-transparent border-2 border-gray-500 text-gray-300 font-semibold rounded-full hover:bg-gray-500 hover:text-white transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:shadow-gray-500/30 flex items-center gap-3') }}
            x-data=""
            @click="$dispatch('open-modal', 'linktree')">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
            </svg>
            @phrase('modal.linktree.button', 'Links & Social')
        </button>
    @elseif ($style == 'color')
        <button {{ $attributes->class('bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-full font-semibold hover:from-blue-500 hover:to-purple-500 transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-blue-500/30 flex items-center gap-2 mx-auto') }}
            x-data=""
            @click="$dispatch('open-modal', 'linktree')">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 005.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
            </svg>
            @phrase('modal.linktree.button', 'Links & Social')
        </button>
    @endif
</div>
