@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="w-full">
        <div class="flex items-center justify-between md:justify-center gap-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 rounded-full bg-gray-800/50 border border-gray-700/50 text-gray-500 cursor-not-allowed inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    <span class="hidden sm:inline">Vorige</span>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-4 py-2 rounded-full bg-gradient-to-r from-indigo-600/20 to-blue-600/20 border border-indigo-500/30 text-indigo-300 hover:text-indigo-200 hover:border-indigo-400 hover:from-indigo-600/30 hover:to-blue-600/30 transition inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    <span class="hidden sm:inline">Vorige</span>
                </a>
            @endif

            {{-- Pagination Elements (hidden on small screens) --}}
            @php
                $current = $paginator->currentPage();
                $last = $paginator->lastPage();
                $start = max(1, $current - 2);
                $end = min($last, $current + 2);
            @endphp
            <div class="hidden md:flex items-center gap-1">
                @if ($start > 1)
                    <a href="{{ $paginator->url(1) }}" class="px-4 py-2 rounded-full bg-gray-800/70 border border-gray-700/50 text-gray-300 hover:text-white hover:border-gray-500 transition">1</a>
                    @if ($start > 2)
                        <span class="px-3 py-2 text-gray-400">…</span>
                    @endif
                @endif

                @for ($page = $start; $page <= $end; $page++)
                    @if ($page == $current)
                        <span class="px-4 py-2 rounded-full bg-gradient-to-r from-indigo-600 to-blue-600 text-white border border-indigo-500/60 shadow-md shadow-indigo-900/20">{{ $page }}</span>
                    @else
                        <a href="{{ $paginator->url($page) }}" class="px-4 py-2 rounded-full bg-gray-800/70 border border-gray-700/50 text-gray-300 hover:text-white hover:border-gray-500 transition">{{ $page }}</a>
                    @endif
                @endfor

                @if ($end < $last)
                    @if ($end < $last - 1)
                        <span class="px-3 py-2 text-gray-400">…</span>
                    @endif
                    <a href="{{ $paginator->url($last) }}" class="px-4 py-2 rounded-full bg-gray-800/70 border border-gray-700/50 text-gray-300 hover:text-white hover:border-gray-500 transition">{{ $last }}</a>
                @endif
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-4 py-2 rounded-full bg-gradient-to-r from-blue-600/20 to-indigo-600/20 border border-indigo-500/30 text-indigo-300 hover:text-indigo-200 hover:border-indigo-400 hover:from-blue-600/30 hover:to-indigo-600/30 transition inline-flex items-center gap-2">
                    <span class="hidden sm:inline">Volgende</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            @else
                <span class="px-4 py-2 rounded-full bg-gray-800/50 border border-gray-700/50 text-gray-500 cursor-not-allowed inline-flex items-center gap-2">
                    <span class="hidden sm:inline">Volgende</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
            @endif
        </div>
    </nav>
@endif


