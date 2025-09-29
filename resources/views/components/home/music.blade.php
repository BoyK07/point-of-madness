@props(['latestRelease' => null, 'popularTracks' => collect(), 'artist' => null])

@php
    $artistSpotifyLink = ssot_links('social.spotify')->first();
@endphp

<!-- Professional Music & Releases Section -->
<div class="relative py-16 sm:py-24 px-4 sm:px-6 lg:px-12 overflow-hidden">
    <!-- Professional Background -->
    <div class="absolute inset-0 bg-gradient-to-tr from-gray-900/30 via-gray-800/30 to-gray-700/30"></div>
    <div class="absolute top-1/4 left-1/6 w-64 h-64 sm:w-80 sm:h-80 lg:w-96 lg:h-96 bg-blue-900/10 rounded-full filter blur-3xl hidden sm:block"></div>
    <div class="absolute bottom-1/4 right-1/6 w-64 h-64 sm:w-80 sm:h-80 lg:w-96 lg:h-96 bg-purple-900/10 rounded-full filter blur-3xl hidden sm:block"></div>

    <div class="relative max-w-screen-lg xl:max-w-screen-xl mx-auto">
        <div class="text-center mb-12 sm:mb-16">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">
                <span class="bg-gradient-to-r from-blue-400 via-purple-400 to-gray-400 bg-clip-text text-transparent">
                    @phrase('home.music.heading', 'Latest Releases')
                </span>
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
            <p class="text-gray-400 mt-6 text-base sm:text-lg">@phrase('home.music.subheading', 'Professional new wave sound available on all platforms')</p>
        </div>

        @if($latestRelease)
            <!-- Featured Release -->
            <div class="mb-12 sm:mb-16">
                <div class="bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm border border-blue-500/20
                            rounded-3xl p-6 sm:p-8 max-w-4xl mx-auto hover:border-blue-500/40 transition-all duration-300">
                    <div class="flex flex-col xl:flex-row items-center gap-8 xl:gap-10">
                        <!-- Cover Art -->
                        <div class="relative group">
                            <div class="w-48 h-48 sm:w-56 sm:h-56 lg:w-64 lg:h-64 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl p-1">
                                <div class="w-full h-full bg-black rounded-xl flex items-center justify-center relative overflow-hidden">
                                    @if($latestRelease->image)
                                        <img src="{{ $latestRelease->image }}" alt="{{ $latestRelease->name }} cover" class="w-full h-full object-cover">
                                    @endif
                                </div>
                            </div>
                            <!-- Play button overlay to Spotify -->
                            @php
                                $isAlbum = method_exists($latestRelease, 'tracks');
                                $spotifyUrl = $isAlbum
                                    ? 'https://open.spotify.com/album/' . $latestRelease->spotify_id
                                    : 'https://open.spotify.com/track/' . $latestRelease->spotify_id;
                            @endphp
                            <a href="{{ $spotifyUrl }}" target="_blank" class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100
                                        transition-opacity duration-300 bg-black/40 rounded-2xl">
                                <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center
                                            transform hover:scale-110 transition-transform duration-200">
                                    <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </a>
                        </div>

                        <!-- Release Info -->
                        <div class="flex-1 text-center xl:text-left">
                            <div class="mb-4">
                                <span class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-4 py-2
                                             rounded-full text-sm font-semibold uppercase tracking-wide">
                                    {{ $isAlbum ? phrase('home.music.latest.badge.album', 'Latest Album') : phrase('home.music.latest.badge.single', 'Latest Single') }}
                                </span>
                            </div>
                            <h3 class="text-3xl sm:text-4xl md:text-5xl font-black text-white mb-2">{{ $latestRelease->name }}</h3>
                            <div class="text-gray-400 mb-6 text-sm sm:text-base">
                                @phrase('home.music.latest.released_prefix', 'Released') {{ $latestRelease->release_date?->format('F j, Y') ?? '—' }}
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 justify-center xl:justify-start">
                                <a href="{{ $spotifyUrl }}" target="_blank"
                                   class="group flex items-center justify-center gap-2 bg-green-600 hover:bg-green-500 text-white
                                        py-3 px-4 rounded-full font-semibold transition-all duration-300
                                          transform hover:scale-105 hover:shadow-lg hover:shadow-green-500/30 text-sm">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.6 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.42 1.56-.299.421-1.02.599-1.559.3z"/>
                                    </svg>
                                    @phrase('home.music.latest.spotify_button', 'Spotify')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Popular Tracks -->
        @if($popularTracks->isNotEmpty())
            <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-6 sm:gap-8">
                @php
                    $accents = ['pink', 'purple', 'cyan', 'green', 'blue', 'yellow', 'red'];
                @endphp
                @foreach($popularTracks as $i => $track)
                    @php $accent = $accents[$i % count($accents)]; @endphp
                    <a href="https://open.spotify.com/track/{{ $track->spotify_id }}" target="_blank"
                       class="group relative rounded-2xl overflow-hidden border border-{{ $accent }}-500/20
                              hover:border-{{ $accent }}-500/50 transition-all duration-300
                              transform hover:scale-105 hover:shadow-lg hover:shadow-{{ $accent }}-500/20">
                        <div class="absolute inset-0 bg-center bg-cover" style="background-image: url('{{ $track->image }}');"></div>
                        <div class="absolute inset-0 bg-black/60 group-hover:bg-black/50 transition-colors"></div>
                            <div class="relative p-6 sm:p-7 min-h-[220px] sm:min-h-[260px] md:min-h-[280px] flex flex-col items-center text-center justify-end">
                                <h4 class="text-white font-bold text-xl sm:text-2xl mb-3">{{ $track->name }}</h4>
                                <div class="space-y-1 text-sm sm:text-base">
                                    <div class="text-{{ $accent }}-400 font-semibold">
                                    {{ is_numeric($track->playcount) ? number_format((float) $track->playcount) : 'N/A' }} @phrase('home.music.popular.playcount_suffix', 'plays')
                                    </div>
                                    <div class="text-gray-400 text-xs sm:text-sm">{{ $track->release_date?->format('Y') ?? '—' }}</div>
                                </div>
                            <div class="mt-5">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-{{ $accent }}-500 rounded-full flex items-center justify-center ">
                                    <svg class="w-5 h-5 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

        <!-- Spotify Artist Link -->
        <div class="mt-12 sm:mt-16 text-center">
            <div class="inline-flex flex-col sm:flex-row items-center gap-5 sm:gap-4 bg-gradient-to-r from-green-600/10 to-purple-600/10
                        backdrop-blur-sm border border-green-500/20 rounded-xl p-5 sm:p-6">
                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.6 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.42 1.56-.299.421-1.02.599-1.559.3z"/>
                    </svg>
                </div>
                <div class="text-center sm:text-left">
                    <div class="text-white font-semibold text-sm sm:text-base">{{ is_numeric($artist?->spotify_monthly_listeners ?? $artist?->monthly_listeners) ? number_format((float) ($artist?->spotify_monthly_listeners ?? $artist?->monthly_listeners)) : 'N/A' }} @phrase('home.music.follow.monthly_listeners_suffix', 'monthly listeners')</div>
                    <div class="text-gray-400 text-xs sm:text-sm">@phrase('home.music.follow.subtitle', 'Follow us on Spotify for new releases')</div>
                </div>
                <a href="{{ $artistSpotifyLink?->url ?? '#' }}" target="{{ $artistSpotifyLink?->target ?? '_blank' }}"
                   @if($artistSpotifyLink?->rel) rel="{{ $artistSpotifyLink->rel }}" @endif
                   class="bg-green-500 hover:bg-green-400 text-white px-5 py-2 rounded-full text-sm font-semibold
                          transition-all duration-300 transform hover:scale-105 w-full sm:w-auto">
                    @phrase('home.music.follow.button', 'Follow')
                </a>
            </div>
        </div>
    </div>
</div>
