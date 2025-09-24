<x-app-layout>
    <section class="relative overflow-hidden bg-slate-900 py-24 text-white">
        @php($hero = ssot_media('homepage.hero'))
        @if($hero)
            <img src="{{ $hero->versioned_url }}" alt="{{ $hero->alt }}" class="absolute inset-0 h-full w-full object-cover opacity-40">
        @endif
        <div class="relative mx-auto max-w-4xl px-4">
            <h1 class="text-4xl font-bold md:text-5xl">@phrase('homepage.hero.title', 'Point of Madness')</h1>
            <p class="mt-4 max-w-2xl text-lg text-slate-200">@phrase('homepage.hero.subtitle', 'New wave energy from the Netherlands.')</p>
            <div class="mt-6 flex flex-wrap gap-3">
                @forelse($heroLinks as $link)
                    <a href="{{ $link->url }}" @if($link->target) target="{{ $link->target }}" @endif @if($link->rel) rel="{{ $link->rel }}" @endif class="inline-flex items-center gap-2 rounded-md bg-white/10 px-5 py-3 text-sm font-semibold text-white ring-1 ring-white/40 backdrop-blur hover:bg-white/20">
                        {{ $link->label }}
                    </a>
                @empty
                    <a href="{{ route('events.index') }}" class="inline-flex items-center gap-2 rounded-md bg-white px-5 py-3 text-sm font-semibold text-slate-900 hover:bg-slate-100">@phrase('homepage.hero.cta', 'View events')</a>
                @endforelse
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-5xl px-4 py-16">
        <div class="grid gap-8 md:grid-cols-2">
            <article class="space-y-4">
                <h2 class="text-2xl font-semibold text-slate-900">@phrase('homepage.about.title', 'About the band')</h2>
                <p class="text-slate-600">@phrase('homepage.about.body', 'Point of Madness revives the 80s with shimmering synths, powerful vocals, and a modern production edge.')</p>
                <p class="text-slate-600">@phrase('homepage.about.secondary', 'Stay tuned for new releases, show announcements, and behind-the-scenes stories straight from the rehearsal room.')</p>
            </article>
            <aside class="rounded-xl border border-slate-200 bg-slate-50 p-6">
                <h3 class="text-lg font-semibold text-slate-900">@phrase('homepage.cta.title', 'Join the mailing list')</h3>
                <p class="mt-2 text-sm text-slate-600">@phrase('homepage.cta.body', 'Subscribe to hear about new music and gigs before anyone else.')</p>
                @if($signup = ssot_links('newsletter')->first())
                    <a href="{{ $signup->url }}" @if($signup->target) target="{{ $signup->target }}" @endif @if($signup->rel) rel="{{ $signup->rel }}" @endif class="mt-4 inline-flex items-center rounded-md bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700">
                        {{ $signup->label }}
                    </a>
                @endif
            </aside>
        </div>
    </section>

    <section class="bg-slate-50 py-16">
        <div class="mx-auto max-w-5xl px-4">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-semibold text-slate-900">@phrase('homepage.events.title', 'Upcoming shows')</h2>
                <a href="{{ route('events.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">@phrase('homepage.events.view_all', 'View all events')</a>
            </div>
            <div class="mt-8 grid gap-6 md:grid-cols-3">
                @forelse($events as $event)
                    <article class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                        <h3 class="text-lg font-semibold text-slate-900">{{ $event->title }}</h3>
                        <p class="mt-1 text-sm text-slate-500">{{ $event->starts_at?->timezone(config('app.timezone'))->format('d M Y · H:i') }}</p>
                        @if($event->location)
                            <p class="text-sm text-slate-600">{{ $event->location }}</p>
                        @endif
                        @if($event->description)
                            <p class="mt-3 text-sm text-slate-600">{{ \Illuminate\Support\Str::limit($event->description, 120) }}</p>
                        @endif
                        @if($event->link)
                            <a href="{{ $event->link->url }}" @if($event->link->target) target="{{ $event->link->target }}" @endif @if($event->link->rel) rel="{{ $event->link->rel }}" @endif class="mt-4 inline-flex items-center text-sm font-medium text-slate-900 hover:text-slate-600">{{ $event->link->label }}</a>
                        @endif
                    </article>
                @empty
                    <div class="md:col-span-3 rounded-xl border border-dashed border-slate-300 bg-white px-6 py-10 text-center text-slate-600">
                        @phrase('homepage.events.empty', 'We are booking the next run of shows now. Check back soon!')
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-5xl px-4 py-16">
        <h2 class="text-2xl font-semibold text-slate-900">@phrase('homepage.social.title', 'Stay connected')</h2>
        <p class="mt-2 text-sm text-slate-600">@phrase('homepage.social.body', 'Follow Point of Madness across your favourite platforms.')</p>
        <div class="mt-6 flex flex-wrap gap-3">
            @foreach(ssot_links('social') as $link)
                <a href="{{ $link->url }}" @if($link->target) target="{{ $link->target }}" @endif @if($link->rel) rel="{{ $link->rel }}" @endif class="inline-flex items-center rounded-full border border-slate-300 px-4 py-2 text-sm text-slate-700 hover:border-slate-500 hover:text-slate-900">
                    {{ $link->label }}
                </a>
            @endforeach
        </div>
    </section>
</x-app-layout>
