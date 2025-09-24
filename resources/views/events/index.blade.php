<x-app-layout>
    <section class="bg-slate-900 py-16 text-white">
        <div class="mx-auto max-w-5xl px-4">
            <h1 class="text-4xl font-bold">@phrase('events.title', 'Upcoming events')</h1>
            <p class="mt-2 max-w-2xl text-slate-300">@phrase('events.subtitle', 'Catch the next Point of Madness performance near you.')</p>
        </div>
    </section>

    <section class="mx-auto max-w-5xl px-4 py-12">
        <div class="space-y-6">
            @forelse(ssot_events_upcoming() as $event)
                <article class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                        <div>
                            <h2 class="text-2xl font-semibold text-slate-900">{{ $event->title }}</h2>
                            <p class="mt-1 text-sm text-slate-500">
                                {{ $event->starts_at?->timezone(config('app.timezone'))->format('d M Y · H:i') }}
                                @if($event->ends_at)
                                    <span class="text-slate-400">→ {{ $event->ends_at->timezone(config('app.timezone'))->format('d M Y · H:i') }}</span>
                                @endif
                            </p>
                            @if($event->location)
                                <p class="mt-1 text-sm text-slate-600">{{ $event->location }}</p>
                            @endif
                        </div>
                        <div class="flex items-center gap-3">
                            @if($event->media)
                                <img src="{{ $event->media->versioned_url }}" alt="{{ $event->media->alt }}" class="h-24 w-24 rounded-lg object-cover">
                            @endif
                            @if($event->link)
                                <a href="{{ $event->link->url }}" @if($event->link->target) target="{{ $event->link->target }}" @endif @if($event->link->rel) rel="{{ $event->link->rel }}" @endif class="inline-flex items-center gap-2 rounded-md bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700">
                                    {{ $event->link->label }}
                                </a>
                            @endif
                        </div>
                    </div>
                    @if($event->description)
                        <p class="mt-4 text-sm leading-relaxed text-slate-700">{{ $event->description }}</p>
                    @endif
                </article>
            @empty
                <div class="rounded-xl border border-dashed border-slate-300 bg-slate-50 px-6 py-12 text-center text-slate-600">
                    @phrase('events.empty', 'No upcoming shows are scheduled right now. Check back soon!')
                </div>
            @endforelse
        </div>
    </section>
</x-app-layout>
