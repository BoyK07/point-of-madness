<footer class="mt-20 border-t border-slate-200 bg-slate-50 py-12">
    <div class="mx-auto max-w-6xl px-4">
        <div class="flex flex-col gap-8 md:flex-row md:items-start md:justify-between">
            <div class="max-w-md space-y-3">
                <h2 class="text-xl font-semibold text-slate-900">@phrase('footer.title', 'Point of Madness')</h2>
                <p class="text-sm text-slate-600">@phrase('footer.tagline', 'Independent new wave from the Netherlands.')</p>
            </div>
            <div class="grid flex-1 gap-6 md:grid-cols-2">
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-500">@phrase('footer.links.title', 'Links')</h3>
                    <ul class="mt-3 space-y-2 text-sm text-slate-600">
                        @foreach(ssot_links('footer') as $link)
                            <li>
                                <a href="{{ $link->url }}" @if($link->target) target="{{ $link->target }}" @endif @if($link->rel) rel="{{ $link->rel }}" @endif class="hover:text-slate-900">
                                    {{ $link->label }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-500">@phrase('footer.social.title', 'Connect')</h3>
                    <ul class="mt-3 space-y-2 text-sm text-slate-600">
                        @foreach(ssot_links('social') as $link)
                            <li>
                                <a href="{{ $link->url }}" @if($link->target) target="{{ $link->target }}" @endif @if($link->rel) rel="{{ $link->rel }}" @endif class="hover:text-slate-900">
                                    {{ $link->label }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="mt-10 flex flex-col gap-2 text-xs text-slate-500 md:flex-row md:items-center md:justify-between">
            <span>&copy; {{ now()->year }} @phrase('footer.copyright', 'Point of Madness. All rights reserved.')</span>
            <span>@phrase('footer.credit', 'Built on a single source of truth.')</span>
        </div>
    </div>
</footer>
