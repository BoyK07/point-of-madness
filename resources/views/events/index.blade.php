@php
    $upcomingEvents = ssot_events_upcoming();
    $accentColors = ['blue', 'purple', 'gray', 'indigo', 'pink'];
@endphp

<x-app-layout>
    <!-- Professional Events Page -->
    <div class="relative min-h-screen overflow-hidden">
        <!-- Background matching homepage -->
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900 via-gray-800 to-black">
            <div class="absolute inset-0 opacity-5">
                <div class="absolute inset-0" style="background-image:
                    linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px);
                    background-size: 30px 30px;">
                </div>
            </div>
        </div>

        <!-- Ambient effects -->
        <div class="absolute top-1/4 left-1/4 w-64 h-64 sm:w-80 sm:h-80 lg:w-96 lg:h-96 bg-blue-900/10 rounded-full filter blur-3xl hidden sm:block"></div>
        <div class="absolute bottom-1/4 right-1/4 w-64 h-64 sm:w-80 sm:h-80 lg:w-96 lg:h-96 bg-purple-900/10 rounded-full filter blur-3xl hidden sm:block"></div>

        <!-- Content -->
        <div class="relative z-10 py-16 sm:py-24 px-4 sm:px-6 lg:px-10">
            <div class="max-w-6xl mx-auto">
                <!-- Page Header -->
                <div class="text-center mb-12 sm:mb-16">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-black mb-4 tracking-wide">
                        <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                            @phrase('events.index.heading', 'Upcoming Events')
                        </span>
                    </h1>
                    <div class="w-20 sm:w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
                    <p class="text-gray-400 mt-6 text-base sm:text-lg md:text-xl">@phrase('events.index.subheading', 'Catch Point of Madness live this September')</p>
                </div>

                <!-- Events Grid -->
                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6 sm:gap-8 mb-14 sm:mb-16">
                    @foreach($upcomingEvents as $index => $event)
                        @php
                            $accent = $accentColors[$index % count($accentColors)];
                            $slug = \Illuminate\Support\Str::slug($event->title, '_');
                            $phrasePrefix = 'events.' . $slug;
                            $typeLabel = phrase($phrasePrefix . '.type', 'Live Show');
                            $timeLabel = phrase($phrasePrefix . '.time', $event->starts_at?->format('g:i A') ?? '');
                            $description = phrase($phrasePrefix . '.description', $event->description ?? '');
                        @endphp
                        <div class="group relative">
                            <!-- Professional Event Card -->
                            <div class="relative bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm
                                        border border-{{ $accent }}-500/20 rounded-2xl overflow-hidden
                                        transform transition-all duration-300 hover:scale-105 hover:border-{{ $accent }}-500/40
                                        hover:shadow-xl hover:shadow-{{ $accent }}-500/20">

                                <!-- Event Header -->
                                <div class="bg-gradient-to-r from-{{ $accent }}-600 to-{{ $accent }}-700 p-5 sm:p-6 text-center">
                                    <div class="text-white">
                                        <div class="text-xs sm:text-sm font-semibold uppercase tracking-wider opacity-90">{{ $typeLabel }}</div>
                                        <div class="text-2xl sm:text-3xl font-black mt-1">{{ $event->starts_at?->format('M j') ?? '—' }}</div>
                                        <div class="text-xs sm:text-sm opacity-90">{{ $event->starts_at?->format('l') ?? '' }}</div>
                                    </div>
                                </div>

                                <!-- Event Details -->
                                <div class="p-5 sm:p-6 space-y-4">
                                    <div class="text-center">
                                        <h3 class="text-lg sm:text-xl font-bold text-white mb-1">{{ $event->title }}</h3>
                                        <p class="text-gray-400 text-xs sm:text-sm">{{ $event->location }}</p>
                                    </div>

                                    <div class="flex flex-col sm:flex-row justify-between items-center gap-2 text-xs sm:text-sm">
                                        <div class="text-gray-400">
                                            <div class="flex items-center justify-center sm:justify-start gap-2">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                                </svg>
                                                <span>{{ $timeLabel }}</span>
                                            </div>
                                        </div>
                                        <div class="text-{{ $accent }}-400 font-semibold">
                                            {{ $typeLabel }}
                                        </div>
                                    </div>

                                    <p class="text-gray-300 text-sm leading-relaxed">
                                        {{ $description }}
                                    </p>

                                    <!-- Point of Madness branding -->
                                    <div class="pt-4 border-t border-gray-700">
                                        <div class="text-center text-[0.65rem] sm:text-xs text-gray-500 uppercase tracking-wider">
                                            @phrase('brand.name', 'Point of Madness')
                                        </div>
                                    </div>
                                </div>

                                <!-- Hover Effect -->
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                    <div class="absolute inset-0 bg-gradient-to-br from-{{ $accent }}-500/5 to-transparent"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Call to Action Section -->
                <div class="text-center">
                    <div class="bg-gradient-to-r from-gray-700/20 to-gray-600/20 backdrop-blur-sm border border-gray-500/20
                                rounded-xl p-6 sm:p-8 max-w-2xl mx-auto">
                        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">@phrase('events.index.cta.title', 'Stay Updated')</h2>
                        <p class="text-gray-300 text-base sm:text-lg mb-6">
                            @phrase('events.index.cta.description', 'Follow us on social media for the latest tour announcements, behind-the-scenes content, and exclusive updates.')
                        </p>

                        <!-- Social Links -->
                        <div class="flex flex-col sm:flex-row justify-center gap-4">
                            @php $instagramLink = ssot_links('social.instagram')->first(); @endphp
                            <a href="{{ $instagramLink?->url ?? '#' }}" target="{{ $instagramLink?->target ?? '_blank' }}"
                               @if($instagramLink?->rel) rel="{{ $instagramLink->rel }}" @endif
                               class="bg-gradient-to-r from-pink-600 to-purple-600 text-white px-6 py-3 rounded-full
                                      font-semibold hover:from-pink-500 hover:to-purple-500 transition-all duration-300
                                      transform hover:scale-105 hover:shadow-lg hover:shadow-pink-500/30 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                                @phrase('events.index.cta.instagram', 'Follow on Instagram')
                            </a>

                            @php $tiktokLink = ssot_links('social.tiktok')->first(); @endphp
                            <a href="{{ $tiktokLink?->url ?? '#' }}" target="{{ $tiktokLink?->target ?? '_blank' }}"
                               @if($tiktokLink?->rel) rel="{{ $tiktokLink->rel }}" @endif
                               class="bg-gradient-to-r from-gray-600 to-gray-700 text-white px-6 py-3 rounded-full
                                      font-semibold hover:from-gray-500 hover:to-gray-600 transition-all duration-300
                                      transform hover:scale-105 hover:shadow-lg hover:shadow-gray-500/30 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-.88-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                                </svg>
                                @phrase('events.index.cta.tiktok', 'Follow on TikTok')
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
