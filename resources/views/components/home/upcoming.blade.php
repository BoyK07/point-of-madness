@php
    $upcomingEvents = ssot_events_upcoming();
    $accentColors = ['blue', 'purple', 'gray', 'indigo', 'pink'];
@endphp

<!-- Professional Upcoming Shows Section -->
<div class="relative py-16 sm:py-24 px-4 sm:px-6 lg:px-12 overflow-hidden">
    <!-- Professional Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-gray-900/30 via-gray-800/30 to-gray-700/30"></div>
    <div class="absolute top-0 right-1/3 w-48 h-48 sm:w-64 sm:h-64 bg-blue-900/10 rounded-full filter blur-3xl hidden sm:block"></div>
    <div class="absolute bottom-0 left-1/3 w-48 h-48 sm:w-64 sm:h-64 bg-purple-900/10 rounded-full filter blur-3xl hidden sm:block"></div>

    <div class="relative max-w-screen-lg xl:max-w-screen-xl mx-auto">
        <div class="text-center mb-12 sm:mb-16">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">
                <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                    @phrase('home.upcoming.heading', 'On Tour')
                </span>
            </h2>
            <div class="w-20 sm:w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
            <p class="text-gray-400 mt-6 text-base sm:text-lg">@phrase('home.upcoming.subheading', 'Professional live performances - September 2025')</p>
        </div>

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6 sm:gap-8">
            @foreach($upcomingEvents as $index => $event)
                @php
                    $accent = $accentColors[$index % count($accentColors)];
                    $slug = \Illuminate\Support\Str::slug($event->title, '_');
                    $phrasePrefix = 'events.' . $slug;
                    $typeLabel = phrase($phrasePrefix . '.type', 'Live Show');
                    $timeLabel = phrase($phrasePrefix . '.time', $event->starts_at?->format('g:i A') ?? '');
                @endphp
                <div class="group relative">
                    <!-- Concert Ticket Card -->
                    <div class="relative bg-gradient-to-br from-gray-900 to-black border-2 border-{{ $accent }}-500/30
                                rounded-2xl overflow-hidden transform transition-all duration-300 hover:scale-105
                                hover:border-{{ $accent }}-500 hover:shadow-2xl hover:shadow-{{ $accent }}-500/30">

                        <!-- Ticket Perforations -->
                        <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-6 h-6 bg-[#1f0f12] rounded-full border-2 border-{{ $accent }}-500/30 -translate-x-3"></div>
                        <div class="absolute right-0 top-1/2 transform -translate-y-1/2 w-6 h-6 bg-[#1f0f12] rounded-full border-2 border-{{ $accent }}-500/30 translate-x-3"></div>

                        <!-- Ticket Header -->
                        <div class="bg-gradient-to-r from-{{ $accent }}-600 to-{{ $accent }}-700 p-5 sm:p-6 text-center">
                            <div class="text-white">
                                <div class="text-xs sm:text-sm font-semibold uppercase tracking-wider opacity-90">{{ $typeLabel }}</div>
                                <div class="text-2xl sm:text-3xl font-black mt-1">{{ $event->starts_at?->format('M j') ?? '—' }}</div>
                                <div class="text-xs sm:text-sm opacity-90">{{ $event->starts_at?->format('l') ?? '' }}</div>
                            </div>
                        </div>

                        <!-- Dashed Line -->
                        <div class="border-t-2 border-dashed border-{{ $accent }}-500/30"></div>

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

                            <!-- Point of Madness branding -->
                            <div class="pt-4 border-t border-gray-700">
                                <div class="text-center text-[0.65rem] sm:text-xs text-gray-500 uppercase tracking-wider">
                                    @phrase('brand.name', 'Point of Madness')
                                </div>
                            </div>
                        </div>

                        <!-- Hover Effect -->
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                            <div class="absolute inset-0 bg-gradient-to-br from-{{ $accent }}-500/10 to-transparent"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Professional Call to Action -->
        <div class="mt-12 sm:mt-16 text-center">
            <div class="bg-gradient-to-r from-gray-700/20 to-gray-600/20 backdrop-blur-sm border border-gray-500/20
                        rounded-xl p-6 sm:p-8 max-w-md mx-auto">
                <h3 class="text-lg sm:text-xl font-bold text-white mb-4">@phrase('home.upcoming.cta.title', 'Stay Connected')</h3>
                <p class="text-gray-300 text-xs sm:text-sm mb-6">
                    @phrase('home.upcoming.cta.description', 'Follow our latest updates, tour announcements, and connect with us across all platforms.')
                </p>

                <div class="flex justify-center">
                    <x-modal.linktree.button style="color" class="w-full sm:w-auto"/>
                </div>
            </div>
        </div>
    </div>
</div>
