<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin | {{ config('app.name', 'Point of Madness') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#1f0f12] text-white min-h-screen antialiased">
        <div class="min-h-screen flex flex-col">
            <!-- Professional Admin Header with Gradient Effects -->
            <header class="bg-[#1d2634] sticky top-0 z-50 shadow-lg border-b border-gray-700/50">
                <!-- Subtle professional background -->
                <div class="absolute inset-0 bg-gradient-to-r from-blue-900/10 via-purple-900/15 to-gray-900/10"></div>

                <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 py-4 relative z-10">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <!-- Brand Section -->
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500/20 to-purple-600/20 border border-blue-500/30 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h1 class="text-xl font-bold bg-gradient-to-r from-blue-400 via-purple-400 to-gray-300 bg-clip-text text-transparent">
                                        Admin Dashboard
                                    </h1>
                                    <p class="text-sm text-gray-400">{{ config('app.name', 'Point of Madness') }} - Content Management</p>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation -->
                        <nav class="flex flex-wrap gap-1 text-sm">
                            <a href="{{ route('admin.dashboard') }}"
                               class="px-4 py-2 rounded-lg font-medium transition-all duration-300
                                      {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 text-white' : 'text-gray-300 hover:text-gray-100 hover:bg-gray-700/30' }}">
                                Dashboard
                            </a>
                            <a href="{{ route('admin.users.index') }}"
                               class="px-4 py-2 rounded-lg font-medium transition-all duration-300
                                      {{ request()->routeIs('admin.users.*') ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 text-white' : 'text-gray-300 hover:text-gray-100 hover:bg-gray-700/30' }}">
                                Gebruikers
                            </a>
                            <a href="{{ route('admin.media.index') }}"
                               class="px-4 py-2 rounded-lg font-medium transition-all duration-300
                                      {{ request()->routeIs('admin.media.*') ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 text-white' : 'text-gray-300 hover:text-gray-100 hover:bg-gray-700/30' }}">
                                Media
                            </a>
                            <a href="{{ route('admin.links.index') }}"
                               class="px-4 py-2 rounded-lg font-medium transition-all duration-300
                                      {{ request()->routeIs('admin.links.*') ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 text-white' : 'text-gray-300 hover:text-gray-100 hover:bg-gray-700/30' }}">
                                Links
                            </a>
                            <a href="{{ route('admin.events.index') }}"
                               class="px-4 py-2 rounded-lg font-medium transition-all duration-300
                                      {{ request()->routeIs('admin.events.*') ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 text-white' : 'text-gray-300 hover:text-gray-100 hover:bg-gray-700/30' }}">
                                Events
                            </a>
                            <a href="{{ route('admin.phrases.index') }}"
                               class="px-4 py-2 rounded-lg font-medium transition-all duration-300
                                      {{ request()->routeIs('admin.phrases.*') ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 text-white' : 'text-gray-300 hover:text-gray-100 hover:bg-gray-700/30' }}">
                                Teksten
                            </a>
                            <a href="{{ route('index') }}"
                               class="px-4 py-2 rounded-lg font-medium text-gray-300 hover:text-gray-100 hover:bg-gray-700/30 transition-all duration-300"
                               target="_blank" rel="noopener">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                Bekijk site
                            </a>
                        </nav>
                    </div>
                </div>
            </header>

            <!-- Enhanced Background -->
            <div class="relative flex-1">
                <!-- Professional background with subtle texture -->
                <div class="absolute inset-0 bg-gradient-to-b from-gray-900 via-gray-800 to-black">
                    <div class="absolute inset-0 opacity-5">
                        <div class="absolute inset-0"
                            style="background-image:
                            linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px),
                            linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px);
                            background-size: 30px 30px;">
                        </div>
                    </div>
                </div>

                <!-- Ambient effects -->
                <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-900/10 rounded-full filter blur-3xl"></div>
                <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-900/10 rounded-full filter blur-3xl"></div>

                <main class="relative z-10 overflow-x-hidden">
                    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 py-8 space-y-6">
                        @include('admin.partials.flash')
                        {{ $slot }}
                    </div>
                </main>
            </div>

            <!-- Professional Footer -->
            <footer class="bg-gray-800/90 backdrop-blur-sm border-t border-gray-700/50 relative z-10">
                <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 py-4 text-sm">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex items-center gap-4 text-gray-400">
                            <span>&copy; {{ date('Y') }} Point of Madness</span>
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <span>Admin Dashboard</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="text-gray-500">Ingelogd als: {{ auth()->user()->name ?? 'Guest' }}</span>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit"
                                        class="px-4 py-2 bg-gradient-to-r from-red-600/20 to-pink-600/20 border border-red-500/30
                                               text-red-300 hover:text-red-200 hover:border-red-500 hover:bg-red-500/10
                                               rounded-lg transition-all duration-300 transform hover:scale-105">
                                    Uitloggen
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
