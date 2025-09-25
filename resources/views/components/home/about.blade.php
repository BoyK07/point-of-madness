<!-- Professional About Section -->
<div class="relative py-16 sm:py-24 px-4 sm:px-6 lg:px-12">
    <!-- Professional Background -->
    <div class="absolute inset-0 bg-gradient-to-r from-gray-900/30 to-gray-800/30"></div>
    <div class="absolute top-0 left-1/4 w-48 h-48 sm:w-64 sm:h-64 bg-blue-900/10 rounded-full filter blur-3xl hidden sm:block"></div>
    <div class="absolute bottom-0 right-1/4 w-48 h-48 sm:w-64 sm:h-64 bg-purple-900/10 rounded-full filter blur-3xl hidden sm:block"></div>

    <div class="relative max-w-4xl lg:max-w-5xl xl:max-w-6xl mx-auto">
        <div class="text-center mb-12 sm:mb-16">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">
                <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                    @phrase('home.about.heading', 'About the Band')
                </span>
            </h2>
            <div class="w-20 sm:w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
        </div>

        <div class="grid lg:grid-cols-2 gap-10 sm:gap-12 items-center">
            <!-- Text Content -->
            <div class="space-y-6">
                <div class="relative">
                    <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-blue-500 to-purple-500 rounded-full"></div>
                    <p class="text-gray-300 text-base sm:text-lg leading-relaxed pl-1">
                        @phrase('home.about.paragraph_1', 'Meet Point Of Madness, a four-piece band born from a shared love of 80s new wave. Formed in 2023, their music is fueled by drum computers, catchy basslines, and fiery guitar riffs.')
                    </p>
                </div>

                <div class="relative">
                    <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-purple-500 to-gray-500 rounded-full"></div>
                    <p class="text-gray-300 text-base sm:text-lg leading-relaxed pl-1">
                        @phrase('home.about.paragraph_2', "With Floris Anker on bass, Kay Spijker on guitar, Sem van Dongen on vocals, and Kai de Wild on drums, they're on a mission to revive the spirit of the past in today's tech-driven world.")
                    </p>
                </div>

                <div class="relative">
                    <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-gray-500 to-blue-500 rounded-full"></div>
                    <p class="text-gray-300 text-base sm:text-lg leading-relaxed pl-1">
                        @phrase('home.about.paragraph_3', "Get ready to experience a blend of retro vibes and modern sounds that'll transport you back in time while keeping you rooted in the present.")
                    </p>
                </div>
            </div>

            <!-- Stats & Highlights -->
            <div class="space-y-6">
                <div class="bg-gradient-to-br from-gray-700/20 to-gray-600/20 backdrop-blur-sm border border-gray-500/20 rounded-xl p-5 sm:p-6">
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                        @phrase('home.about.quickfacts.title', 'Quick Facts')
                    </h3>
                    <div class="space-y-3 text-sm sm:text-base">
                        <div class="flex justify-between items-center gap-4">
                            <span class="text-gray-400">@phrase('home.about.quickfacts.formed_label', 'Formed')</span>
                            <span class="text-white font-semibold">@phrase('home.about.quickfacts.formed_value', '2023')</span>
                        </div>
                        <div class="flex justify-between items-center gap-4">
                            <span class="text-gray-400">@phrase('home.about.quickfacts.origin_label', 'Origin')</span>
                            <span class="text-white font-semibold">@phrase('home.about.quickfacts.origin_value', 'Netherlands')</span>
                        </div>
                        <div class="flex justify-between items-center gap-4">
                            <span class="text-gray-400">@phrase('home.about.quickfacts.genre_label', 'Genre')</span>
                            <span class="text-white font-semibold">@phrase('home.about.quickfacts.genre_value', 'New Wave Revival')</span>
                        </div>
                        <div class="flex justify-between items-center gap-4">
                            <span class="text-gray-400">@phrase('home.about.quickfacts.members_label', 'Members')</span>
                            <span class="text-white font-semibold">@phrase('home.about.quickfacts.members_value', '4')</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-blue-600/20 to-purple-600/20 backdrop-blur-sm border border-blue-500/20 rounded-xl p-5 sm:p-6">
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 bg-purple-400 rounded-full"></span>
                        @phrase('home.about.latest_release.title', 'Latest Release')
                    </h3>
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-base sm:text-lg">{{ $latestRelease?->name ?? 'N/A' }}</h4>
                            <p class="text-gray-400 text-xs sm:text-sm">@phrase('home.about.latest_release.caption_prefix', 'Latest Release') • {{ $latestRelease?->release_date?->format('Y') ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
