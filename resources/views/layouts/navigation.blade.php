<nav x-data="{ open: false }" class="border-b border-slate-200 bg-white/80 backdrop-blur">
    <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4">
        <a href="{{ route('index') }}" class="flex items-center gap-3">
            @php($logo = ssot_media('site.logo'))
            @if($logo)
                <img src="{{ $logo->versioned_url }}" alt="{{ $logo->alt }}" class="h-10 w-10 rounded-full object-cover">
            @endif
            <span class="text-lg font-semibold text-slate-900">@phrase('site.name', config('app.name'))</span>
        </a>
        <div class="hidden items-center gap-6 text-sm font-medium text-slate-600 md:flex">
            @foreach(ssot_links('nav') as $link)
                <a href="{{ $link->url }}" @if($link->target) target="{{ $link->target }}" @endif @if($link->rel) rel="{{ $link->rel }}" @endif class="hover:text-slate-900">
                    {{ $link->label }}
                </a>
            @endforeach
        </div>
        <div class="hidden items-center gap-3 md:flex">
            @foreach(ssot_links('social') as $link)
                <a href="{{ $link->url }}" @if($link->target) target="{{ $link->target }}" @endif @if($link->rel) rel="{{ $link->rel }}" @endif class="text-slate-500 transition hover:text-slate-900">
                    {{ $link->label }}
                </a>
            @endforeach
        </div>
        <button @click="open = !open" class="md:hidden">
            <svg class="h-6 w-6 text-slate-700" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>
    <div x-cloak x-show="open" class="md:hidden">
        <div class="space-y-2 border-t border-slate-200 px-4 py-4">
            @foreach(ssot_links('nav') as $link)
                <a href="{{ $link->url }}" class="block rounded-md px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">{{ $link->label }}</a>
            @endforeach
        </div>
    </div>
</nav>
