<div>
    <x-modal name="linktree" maxWidth="lg">
        <div class="space-y-6 rounded-2xl border border-slate-200 bg-white p-8 shadow-xl">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-2xl font-semibold text-slate-900">@phrase('modal.linktree.title', 'Point of Madness')</h2>
                    <p class="text-sm text-slate-600">@phrase('modal.linktree.subtitle', 'All official links in one place.')</p>
                </div>
                <button @click="$dispatch('close-modal', 'linktree')" class="text-slate-400 hover:text-slate-700" type="button">
                    <span class="sr-only">@phrase('modal.linktree.close', 'Close')</span>
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-500">@phrase('modal.linktree.social.title', 'Connect')</h3>
                    <ul class="mt-3 space-y-2 text-sm text-slate-700">
                        @foreach(ssot_links('social') as $link)
                            <li>
                                <a href="{{ $link->url }}" @if($link->target) target="{{ $link->target }}" @endif @if($link->rel) rel="{{ $link->rel }}" @endif class="flex items-center justify-between rounded-md border border-slate-200 px-3 py-2 hover:border-slate-400 hover:text-slate-900">
                                    <span>{{ $link->label }}</span>
                                    <span class="text-xs text-slate-400">@phrase('modal.linktree.social.action', 'Follow')</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-500">@phrase('modal.linktree.music.title', 'Listen')</h3>
                    <ul class="mt-3 space-y-2 text-sm text-slate-700">
                        @foreach(ssot_links('music') as $link)
                            <li>
                                <a href="{{ $link->url }}" @if($link->target) target="{{ $link->target }}" @endif @if($link->rel) rel="{{ $link->rel }}" @endif class="flex items-center justify-between rounded-md border border-slate-200 px-3 py-2 hover:border-slate-400 hover:text-slate-900">
                                    <span>{{ $link->label }}</span>
                                    <span class="text-xs text-slate-400">@phrase('modal.linktree.music.action', 'Open')</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-500">@phrase('modal.linktree.video.title', 'Watch')</h3>
                <ul class="mt-3 space-y-2 text-sm text-slate-700">
                    @foreach(ssot_links('video') as $link)
                        <li>
                            <a href="{{ $link->url }}" @if($link->target) target="{{ $link->target }}" @endif @if($link->rel) rel="{{ $link->rel }}" @endif class="flex items-center justify-between rounded-md border border-slate-200 px-3 py-2 hover:border-slate-400 hover:text-slate-900">
                                <span>{{ $link->label }}</span>
                                <span class="text-xs text-slate-400">@phrase('modal.linktree.video.action', 'Play')</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </x-modal>
</div>
