<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin | {{ config('app.name', 'Point of Madness') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
    </head>
    <body class="bg-[#1f0f12] text-white min-h-screen antialiased overflow-x-hidden">
        <div class="min-h-screen flex flex-col">
            <!-- Professional Admin Header with Gradient Effects -->
            <header class="bg-[#1d2634] sticky top-0 z-50 shadow-lg border-b border-gray-700/50 overflow-hidden" x-data="{ open: false }" @keydown.window.escape="open = false">
                <!-- Subtle professional background -->
                <div class="absolute inset-0 bg-gradient-to-r from-blue-900/10 via-purple-900/15 to-gray-900/10"></div>

                <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 py-4 relative z-10">
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center justify-between gap-4">
                            <!-- Brand Section -->
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

                            <button type="button"
                                    class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg border border-gray-700/60 text-gray-300 hover:text-white hover:border-gray-500 transition"
                                    @click.stop="open = !open"
                                    :aria-expanded="open"
                                    aria-controls="admin-navigation">
                                <span class="sr-only">Toggle navigatie</span>
                                <svg x-show="!open" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                                <svg x-show="open" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Navigation -->
                        <nav id="admin-navigation"
                             x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 -translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 -translate-y-2"
                             class="flex flex-col gap-2 pt-2 border-t border-gray-700/40 text-sm md:border-none md:pt-0 md:flex md:flex-row md:flex-wrap md:items-center md:justify-between"
                             @click.outside="open = false"
                             style="display: none;" x-cloak>
                            <div class="flex flex-col gap-2 md:flex-row md:flex-wrap md:items-center md:gap-1">
                                <a href="{{ route('admin.dashboard') }}"
                                   @click="open = false"
                                   class="w-full md:w-auto px-4 py-2 rounded-lg font-medium transition-all duration-300 text-center md:text-left
                                          {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 text-white' : 'text-gray-300 hover:text-gray-100 hover:bg-gray-700/30' }}">
                                    Dashboard
                                </a>
                                <a href="{{ route('admin.users.index') }}"
                                   @click="open = false"
                                   class="w-full md:w-auto px-4 py-2 rounded-lg font-medium transition-all duration-300 text-center md:text-left
                                          {{ request()->routeIs('admin.users.*') ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 text-white' : 'text-gray-300 hover:text-gray-100 hover:bg-gray-700/30' }}">
                                    Gebruikers
                                </a>
                                <a href="{{ route('admin.media.index') }}"
                                   @click="open = false"
                                   class="w-full md:w-auto px-4 py-2 rounded-lg font-medium transition-all duration-300 text-center md:text-left
                                          {{ request()->routeIs('admin.media.*') ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 text-white' : 'text-gray-300 hover:text-gray-100 hover:bg-gray-700/30' }}">
                                    Media
                                </a>
                                <a href="{{ route('admin.links.index') }}"
                                   @click="open = false"
                                   class="w-full md:w-auto px-4 py-2 rounded-lg font-medium transition-all duration-300 text-center md:text-left
                                          {{ request()->routeIs('admin.links.*') ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 text-white' : 'text-gray-300 hover:text-gray-100 hover:bg-gray-700/30' }}">
                                    Links
                                </a>
                                <a href="{{ route('admin.events.index') }}"
                                   @click="open = false"
                                   class="w-full md:w-auto px-4 py-2 rounded-lg font-medium transition-all duration-300 text-center md:text-left
                                          {{ request()->routeIs('admin.events.*') ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 text-white' : 'text-gray-300 hover:text-gray-100 hover:bg-gray-700/30' }}">
                                    Events
                                </a>
                                <a href="{{ route('admin.phrases.index') }}"
                                   @click="open = false"
                                   class="w-full md:w-auto px-4 py-2 rounded-lg font-medium transition-all duration-300 text-center md:text-left
                                          {{ request()->routeIs('admin.phrases.*') ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 text-white' : 'text-gray-300 hover:text-gray-100 hover:bg-gray-700/30' }}">
                                    Teksten
                                </a>
                            </div>
                            <a href="{{ route('index') }}"
                               class="w-full md:w-auto px-4 py-2 rounded-lg font-medium text-gray-300 hover:text-gray-100 hover:bg-gray-700/30 transition-all duration-300 inline-flex items-center justify-center md:justify-start gap-2"
                               target="_blank" rel="noopener"
                               @click="open = false">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                Bekijk site
                            </a>
                        </nav>
                    </div>
                </div>
            </header>

            <!-- Enhanced Background -->
            <div class="relative flex-1 overflow-hidden">
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

                <main class="relative z-10">
                    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
                        @include('admin.partials.flash')
                        {{ $slot }}
                    </div>
                </main>
            </div>

            <!-- Professional Footer -->
            <footer class="bg-gray-800/90 backdrop-blur-sm border-t border-gray-700/50 relative z-10">
                <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-sm">
                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                        <div class="flex flex-col gap-2 text-gray-400 sm:flex-row sm:items-center sm:gap-4 text-center sm:text-left">
                            <span>&copy; {{ date('Y') }} Point of Madness</span>
                            <div class="flex items-center justify-center gap-2 sm:justify-start">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <span>Admin Dashboard</span>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-4 text-center sm:text-left">
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
