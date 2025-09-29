@use('Carbon\Carbon')

<!-- Professional Footer -->
@php
    $footerListenLinks = [
        ['slug' => 'streaming.spotify', 'phrase' => 'footer.listen.spotify', 'default' => 'Spotify', 'hover' => 'hover:text-green-400'],
        ['slug' => 'streaming.youtube', 'phrase' => 'footer.listen.youtube', 'default' => 'YouTube', 'hover' => 'hover:text-red-400'],
        ['slug' => 'streaming.apple_music', 'phrase' => 'footer.listen.apple_music', 'default' => 'Apple Music', 'hover' => 'hover:text-orange-400'],
    ];

    $footerConnectLinks = [
        ['slug' => 'social.instagram', 'phrase' => 'footer.connect.instagram', 'default' => 'Instagram', 'hover' => 'hover:text-pink-400'],
        ['slug' => 'social.tiktok', 'phrase' => 'footer.connect.tiktok', 'default' => 'TikTok', 'hover' => 'hover:text-pink-400'],
    ];

    $footerContactLinks = [
        ['slug' => 'contact.booking', 'phrase' => 'footer.contact.booking', 'default' => 'Booking'],
        ['slug' => 'contact.presskit', 'phrase' => 'footer.contact.presskit', 'default' => 'Press Kit'],
        ['slug' => 'contact.management', 'phrase' => 'footer.contact.management', 'default' => 'Management'],
    ];

    $iconSpotify = ssot_links('social.spotify')->first();
    $iconInstagram = ssot_links('social.instagram')->first();
    $iconTiktok = ssot_links('social.tiktok')->first();
    $iconYoutube = ssot_links('social.youtube')->first();
    $iconYoutubeMusic = ssot_links('social.youtube_music')->first();
@endphp

<footer class="relative mt-24 py-12 sm:py-16 px-4 sm:px-6 overflow-hidden">
    <!-- Professional Background -->
    <div class="absolute inset-0 bg-gradient-to-t from-black via-gray-900/30 to-transparent"></div>
    <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-blue-900/5 rounded-full filter blur-3xl hidden sm:block"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-900/5 rounded-full filter blur-3xl hidden sm:block"></div>

    <div class="relative max-w-4xl sm:max-w-5xl mx-auto">
        <!-- Main Footer Content -->
        <div class="text-center space-y-8">
            <!-- Band Logo/Name -->
            <div class="mb-12">
                <h3 class="text-2xl sm:text-3xl font-black tracking-wider mb-2">
                    <span class="bg-gradient-to-r from-blue-400 via-purple-400 to-gray-400 bg-clip-text text-transparent">
                        @phrase('footer.brand.heading', 'POINT OF MADNESS')
                    </span>
                </h3>
                <div class="w-32 h-px bg-gradient-to-r from-blue-500 to-purple-500 mx-auto"></div>
                <p class="text-gray-400 mt-4 text-xs sm:text-sm">
                    @phrase('footer.brand.subtitle', 'Reviving 80s New Wave • Netherlands • Since 2023')
                </p>
            </div>

            <!-- Quick Links -->
            <div class="grid gap-6 grid-cols-2 sm:gap-8 sm:grid-cols-2 md:grid-cols-3 mb-12 text-left sm:text-center md:text-left">
                <!-- Music Links -->
                <div>
                    <h4 class="text-white font-semibold mb-4 text-base sm:text-lg">@phrase('footer.listen.heading', 'Listen')</h4>
                    <div class="space-y-2">
                        @foreach($footerListenLinks as $item)
                            @php $link = ssot_links($item['slug'])->first(); @endphp
                            <a href="{{ $link?->url ?? '#' }}" target="{{ $link?->target ?? '_blank' }}"
                               @if($link?->rel) rel="{{ $link->rel }}" @endif
                               class="block py-1.5 text-gray-400 {{ $item['hover'] }} transition-colors duration-300">
                                {{ $link?->label ?? phrase($item['phrase'], $item['default']) }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Social Media -->
                <div>
                    <h4 class="text-white font-semibold mb-4 text-base sm:text-lg">@phrase('footer.connect.heading', 'Connect')</h4>
                    <div class="space-y-2">
                        @foreach($footerConnectLinks as $item)
                            @php $link = ssot_links($item['slug'])->first(); @endphp
                            <a href="{{ $link?->url ?? '#' }}" target="{{ $link?->target ?? '_blank' }}"
                               @if($link?->rel) rel="{{ $link->rel }}" @endif
                               class="block py-1.5 text-gray-400 {{ $item['hover'] }} transition-colors duration-300">
                                {{ $link?->label ?? phrase($item['phrase'], $item['default']) }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Contact -->
                <div class="col-span-2 sm:col-span-1">
                    <h4 class="text-white font-semibold mb-4 text-base sm:text-lg">@phrase('footer.contact.heading', 'Contact')</h4>
                    <div class="space-y-2">
                        @foreach($footerContactLinks as $item)
                            @php $link = ssot_links($item['slug'])->first(); @endphp
                            <a href="/contact" target="_self"
                               class="block py-1.5 text-gray-400 hover:text-purple-400 transition-colors duration-300">
                                {{ $link?->label ?? phrase($item['phrase'], $item['default']) }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Social Icons -->
            <div class="flex flex-wrap justify-center gap-4 sm:gap-6 mb-8">
                <a href="{{ $iconSpotify?->url ?? '#' }}" target="{{ $iconSpotify?->target ?? '_blank' }}"
                   @if($iconSpotify?->rel) rel="{{ $iconSpotify->rel }}" @endif
                   class="group w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-green-500/20 to-green-600/20
                          border border-green-500/30 rounded-full flex items-center justify-center
                          hover:border-green-500 hover:bg-green-500/10 transition-all duration-300
                          transform hover:scale-110">
                    <svg class="w-6 h-6 text-green-400 group-hover:text-green-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.6 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.42 1.56-.299.421-1.02.599-1.559.3z"/>
                    </svg>
                </a>

                <a href="{{ $iconInstagram?->url ?? '#' }}" target="{{ $iconInstagram?->target ?? '_blank' }}"
                   @if($iconInstagram?->rel) rel="{{ $iconInstagram->rel }}" @endif
                   class="group w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-pink-500/20 to-purple-600/20
                          border border-pink-500/30 rounded-full flex items-center justify-center
                          hover:border-pink-500 hover:bg-pink-500/10 transition-all duration-300
                          transform hover:scale-110">
                    <svg class="w-6 h-6 text-pink-400 group-hover:text-pink-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>

                <a href="{{ $iconTiktok?->url ?? '#' }}" target="{{ $iconTiktok?->target ?? '_blank' }}"
                   @if($iconTiktok?->rel) rel="{{ $iconTiktok->rel }}" @endif
                   class="group w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-gray-500/20 to-gray-600/20
                          border border-gray-500/30 rounded-full flex items-center justify-center
                          hover:border-gray-500 hover:bg-gray-500/10 transition-all duration-300
                          transform hover:scale-110">
                    <svg class="w-6 h-6 text-gray-400 group-hover:text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-.88-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                    </svg>
                </a>



                <a href="{{ $iconYoutube?->url ?? '#' }}" target="{{ $iconYoutube?->target ?? '_blank' }}"
                   @if($iconYoutube?->rel) rel="{{ $iconYoutube->rel }}" @endif
                   class="group w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-red-500/20 to-red-600/20
                          border border-red-500/30 rounded-full flex items-center justify-center
                          hover:border-red-500 hover:bg-red-500/10 transition-all duration-300
                          transform hover:scale-110">
                    <svg class="w-6 h-6 text-red-400 group-hover:text-red-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>

                <a href="{{ $iconYoutubeMusic?->url ?? '#' }}" target="{{ $iconYoutubeMusic?->target ?? '_blank' }}"
                   @if($iconYoutubeMusic?->rel) rel="{{ $iconYoutubeMusic->rel }}" @endif
                   class="group w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-red-500/20 to-red-600/20
                          border border-red-500/30 rounded-full flex items-center justify-center
                          hover:border-red-500 hover:bg-red-500/10 transition-all duration-300
                          transform hover:scale-110">
                    <svg class="w-6 h-6 text-red-400 group-hover:text-red-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                </a>
            </div>

            <!-- Copyright and Footer Info -->
            <div class="border-t border-gray-700 pt-8 space-y-4">
                <div class="flex flex-col md:flex-row justify-center items-center gap-2 sm:gap-4 text-gray-400 text-xs sm:text-sm">
                    <div>&copy; {{ Carbon::now()->year }} @phrase('footer.copyright.owner', 'Point of Madness'). @phrase('footer.copyright.rights', 'All rights reserved.')</div>
                    <div class="hidden md:block text-gray-600">•</div>
                    <div>@phrase('footer.craft', 'Made with 💜 for the new wave revival')</div>
                </div>

                <!-- Subtle 80s Reference -->
                <div class="text-center">
                    <div class="inline-flex items-center gap-2 text-xs text-gray-500">
                        <span class="w-1 h-1 bg-pink-500 rounded-full animate-pulse"></span>
                        <span>@phrase('footer.established', 'Est. 2023 • Netherlands')</span>
                        <span class="w-1 h-1 bg-cyan-500 rounded-full animate-pulse"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
