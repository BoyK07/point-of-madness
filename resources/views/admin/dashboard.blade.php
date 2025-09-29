<x-admin-layout>
    <!-- Welcome Section -->
    <div class="relative mb-8">
        <div class="bg-gray-800/70 backdrop-blur-sm border border-gray-600/50 rounded-2xl p-6 sm:p-8 shadow-2xl shadow-black/50">
            <!-- Subtle glow effect -->
            <div class="absolute -inset-1 bg-gradient-to-r from-blue-600/20 via-purple-600/30 to-blue-600/20 rounded-2xl blur-xl opacity-50"></div>
            <div class="relative">
                <div class="flex flex-col gap-4 sm:gap-6 md:flex-row md:items-center md:justify-between mb-4">
                    <div class="space-y-2">
                        <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-400 via-purple-400 to-gray-300 bg-clip-text text-transparent">
                            Dashboard Overview
                        </h2>
                        <p class="text-gray-400">Welkom terug! Hier is een overzicht van je content management systeem.</p>
                    </div>
                    <div class="flex items-center gap-2 text-gray-400">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-sm">Systeem Online</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 mb-8">
        <!-- Users Card -->
        <div class="group relative">
            <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600/40 to-purple-600/40 rounded-2xl blur opacity-30 group-hover:opacity-60 transition duration-300"></div>
            <div class="relative bg-gray-800/80 backdrop-blur-sm border border-gray-600/50 rounded-2xl p-6 h-full">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500/20 to-blue-600/20 border border-blue-500/30 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                        </svg>
                    </div>
                    <span class="text-xs text-blue-400 bg-blue-500/10 px-2 py-1 rounded-full">Actief</span>
                </div>
                <p class="text-sm text-gray-400 mb-1">Gebruikers</p>
                <p class="text-3xl font-bold text-white">{{ $userCount }}</p>
                <div class="mt-3 flex items-center text-xs text-gray-500">
                    <div class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-2"></div>
                    Geregistreerd
                </div>
            </div>
        </div>

        <!-- Media Card -->
        <div class="group relative">
            <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-600/40 to-pink-600/40 rounded-2xl blur opacity-30 group-hover:opacity-60 transition duration-300"></div>
            <div class="relative bg-gray-800/80 backdrop-blur-sm border border-gray-600/50 rounded-2xl p-6 h-full">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500/20 to-purple-600/20 border border-purple-500/30 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-xs text-purple-400 bg-purple-500/10 px-2 py-1 rounded-full">Media</span>
                </div>
                <p class="text-sm text-gray-400 mb-1">Media Files</p>
                <p class="text-3xl font-bold text-white">{{ $mediaCount }}</p>
                <div class="mt-3 flex items-center text-xs text-gray-500">
                    <div class="w-1.5 h-1.5 bg-purple-500 rounded-full mr-2"></div>
                    Uploads
                </div>
            </div>
        </div>

        <!-- Links Card -->
        <div class="group relative">
            <div class="absolute -inset-0.5 bg-gradient-to-r from-green-600/40 to-teal-600/40 rounded-2xl blur opacity-30 group-hover:opacity-60 transition duration-300"></div>
            <div class="relative bg-gray-800/80 backdrop-blur-sm border border-gray-600/50 rounded-2xl p-6 h-full">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500/20 to-green-600/20 border border-green-500/30 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                        </svg>
                    </div>
                    <span class="text-xs text-green-400 bg-green-500/10 px-2 py-1 rounded-full">Links</span>
                </div>
                <p class="text-sm text-gray-400 mb-1">Links</p>
                <p class="text-3xl font-bold text-white">{{ $linkCount }}</p>
                <div class="mt-3 flex items-center text-xs text-gray-500">
                    <div class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2"></div>
                    Extern
                </div>
            </div>
        </div>

        <!-- Events Card -->
        <div class="group relative">
            <div class="absolute -inset-0.5 bg-gradient-to-r from-orange-600/40 to-red-600/40 rounded-2xl blur opacity-30 group-hover:opacity-60 transition duration-300"></div>
            <div class="relative bg-gray-800/80 backdrop-blur-sm border border-gray-600/50 rounded-2xl p-6 h-full">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500/20 to-orange-600/20 border border-orange-500/30 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-xs text-orange-400 bg-orange-500/10 px-2 py-1 rounded-full">Events</span>
                </div>
                <p class="text-sm text-gray-400 mb-1">Events</p>
                <p class="text-3xl font-bold text-white">{{ $eventCount }}</p>
                <div class="mt-3 flex items-center text-xs text-gray-500">
                    <div class="w-1.5 h-1.5 bg-orange-500 rounded-full mr-2"></div>
                    Gepland
                </div>
            </div>
        </div>

        <!-- Phrases Card -->
        <div class="group relative">
            <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-600/40 to-blue-600/40 rounded-2xl blur opacity-30 group-hover:opacity-60 transition duration-300"></div>
            <div class="relative bg-gray-800/80 backdrop-blur-sm border border-gray-600/50 rounded-2xl p-6 h-full">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-500/20 to-indigo-600/20 border border-indigo-500/30 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                        </svg>
                    </div>
                    <span class="text-xs text-indigo-400 bg-indigo-500/10 px-2 py-1 rounded-full">Teksten</span>
                </div>
                <p class="text-sm text-gray-400 mb-1">Teksten</p>
                <p class="text-3xl font-bold text-white">{{ $phraseCount }}</p>
                <div class="mt-3 flex items-center text-xs text-gray-500">
                    <div class="w-1.5 h-1.5 bg-indigo-500 rounded-full mr-2"></div>
                    Vertalingen
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="relative">
        <div class="absolute -inset-1 bg-gradient-to-r from-blue-600/20 via-purple-600/30 to-blue-600/20 rounded-2xl blur-xl opacity-50"></div>
        <div class="relative bg-gray-800/70 backdrop-blur-sm border border-gray-600/50 rounded-2xl p-6 sm:p-8 shadow-2xl shadow-black/50">
            <div class="flex flex-col gap-4 sm:gap-6 md:flex-row md:items-center md:justify-between mb-6">
                <div class="space-y-1">
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-400 via-purple-400 to-gray-300 bg-clip-text text-transparent">
                        Snelle Acties
                    </h2>
                    <p class="text-gray-400 mt-1">Veelgebruikte functies binnen handbereik</p>
                </div>
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500/20 to-purple-600/20 border border-blue-500/30 rounded-lg flex items-center justify-center self-start md:self-auto">
                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
            </div>

            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                <!-- Add Phrase -->
                <a href="{{ route('admin.phrases.create') }}"
                   class="group relative bg-gradient-to-br from-blue-500/10 to-purple-500/10 border border-blue-500/30
                          hover:border-blue-400 hover:from-blue-500/20 hover:to-purple-500/20
                          transition-all duration-300 transform hover:scale-105 rounded-xl p-6 block">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500/20 to-blue-600/20 border border-blue-500/30 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white group-hover:text-blue-300 transition-colors">Nieuwe Tekst</h3>
                            <p class="text-sm text-gray-400">Voeg nieuwe content toe</p>
                        </div>
                    </div>
                </a>

                <!-- Upload Media -->
                <a href="{{ route('admin.media.create') }}"
                   class="group relative bg-gradient-to-br from-purple-500/10 to-pink-500/10 border border-purple-500/30
                          hover:border-purple-400 hover:from-purple-500/20 hover:to-pink-500/20
                          transition-all duration-300 transform hover:scale-105 rounded-xl p-6 block">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500/20 to-purple-600/20 border border-purple-500/30 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white group-hover:text-purple-300 transition-colors">Upload Media</h3>
                            <p class="text-sm text-gray-400">Nieuwe afbeelding uploaden</p>
                        </div>
                    </div>
                </a>

                <!-- Create Event -->
                <a href="{{ route('admin.events.create') }}"
                   class="group relative bg-gradient-to-br from-green-500/10 to-teal-500/10 border border-green-500/30
                          hover:border-green-400 hover:from-green-500/20 hover:to-teal-500/20
                          transition-all duration-300 transform hover:scale-105 rounded-xl p-6 block">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500/20 to-green-600/20 border border-green-500/30 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white group-hover:text-green-300 transition-colors">Nieuw Event</h3>
                            <p class="text-sm text-gray-400">Event plannen</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
