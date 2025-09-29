<!-- Professional Navigation Bar -->
@php
    $navHome = ssot_links('nav.home')->first();
    $navEvents = ssot_links('nav.events')->first();
    $navContact = ssot_links('nav.contact')->first();
    $socialInstagram = ssot_links('social.instagram')->first();
    $socialSpotify = ssot_links('social.spotify')->first();
@endphp

<nav x-data="{ open: false }" class="bg-[#1d2634] sticky top-0 z-50 shadow-sm border-b border-gray-700/50">
    <!-- Subtle professional background -->
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/5 via-purple-900/10 to-gray-900/5"></div>

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex h-16 sm:h-20">
            <div class="flex w-full items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ $navHome?->url ?? route('index') }}" class="flex items-center space-x-3 group">
                        <img src="{{ ssot_image_url('brand.logo') ?? asset('images/pointofmadness_logo.png') }}"
                             alt="@phrase('brand.logo.alt', 'Point of Madness Logo')"
                             class="h-10 sm:h-12 w-auto transition-transform duration-300 group-hover:scale-105">
                        <span class="text-xl font-bold bg-gradient-to-r from-blue-400 via-purple-400 to-gray-300 bg-clip-text text-transparent hidden sm:block">
                            @phrase('brand.name', 'Point of Madness')
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="flex-1 flex justify-center">
                    <div class="hidden space-x-6 lg:space-x-8 sm:flex items-center">
                        <x-nav-link :href="$navHome?->url ?? route('index')" :active="request()->routeIs('index')"
                                    class="px-4 py-2 font-medium transition-all duration-300
                                           {{ request()->routeIs('index') ? 'text-white' : 'text-gray-300 hover:text-gray-100' }}">
                            @phrase('nav.home.label', 'Home')
                        </x-nav-link>
                        <x-nav-link :href="$navEvents?->url ?? route('events.index')" :active="request()->routeIs('events.*')"
                                    class="px-4 py-2 font-medium transition-all duration-300
                                           {{ request()->routeIs('events.*') ? 'text-white' : 'text-gray-300 hover:text-gray-100' }}">
                            @phrase('nav.events.label', 'Upcoming Events')
                        </x-nav-link>
                        <x-nav-link :href="$navContact?->url ?? route('contact.index')" :active="request()->routeIs('contact.*')"
                                    class="px-4 py-2 font-medium transition-all duration-300
                                           {{ request()->routeIs('contact.*') ? 'text-white' : 'text-gray-300 hover:text-gray-100' }}">
                            @phrase('nav.contact.label', 'Contact')
                        </x-nav-link>
                    </div>
                </div>

                <!-- Social Icons -->
                <div class="hidden sm:flex items-center space-x-3">
                    <a href="{{ $socialInstagram?->url ?? '#' }}" target="{{ $socialInstagram?->target ?? '_blank' }}"
                       class="w-10 h-10 bg-gradient-to-br from-pink-500/20 to-purple-600/20 border border-pink-500/30
                              rounded-full flex items-center justify-center hover:border-pink-500 hover:bg-pink-500/10
                              transition-all duration-300 transform hover:scale-110">
                        <svg class="w-5 h-5 text-pink-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="{{ $socialSpotify?->url ?? '#' }}" target="{{ $socialSpotify?->target ?? '_blank' }}"
                       class="w-10 h-10 bg-gradient-to-br from-green-500/20 to-green-600/20 border border-green-500/30
                              rounded-full flex items-center justify-center hover:border-green-500 hover:bg-green-500/10
                              transition-all duration-300 transform hover:scale-110">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.6 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.42 1.56-.299.421-1.02.599-1.559.3z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Mobile Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open"
                        :aria-expanded="open.toString()"
                        aria-controls="primary-mobile-menu"
                        aria-label="Toggle navigation"
                        class="inline-flex items-center justify-center p-2 rounded-lg text-gray-400 hover:text-white
                               hover:bg-gray-700/50 focus:outline-none focus:bg-gray-700/50 focus:text-white
                               transition duration-300 ease-in-out">
                    <svg class="h-6 w-6 transition-transform duration-200" :class="{'rotate-90': open}" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div id="primary-mobile-menu" x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="sm:hidden bg-gray-800/90 backdrop-blur-sm border-t border-gray-700/50"
         style="display: none;" x-cloak>
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="$navHome?->url ?? route('index')" :active="request()->routeIs('index')"
                                   class="block px-4 py-3 font-medium transition-all duration-300
                                          {{ request()->routeIs('index') ? 'text-white' : 'text-gray-300 hover:text-gray-100' }}">
                @phrase('nav.home.label', 'Home')
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="$navEvents?->url ?? route('events.index')" :active="request()->routeIs('events.*')"
                                   class="block px-4 py-3 font-medium transition-all duration-300
                                          {{ request()->routeIs('events.*') ? 'text-white' : 'text-gray-300 hover:text-gray-100' }}">
                @phrase('nav.events.label', 'Upcoming Events')
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="$navContact?->url ?? route('contact.index')" :active="request()->routeIs('contact.*')"
                                   class="block px-4 py-3 font-medium transition-all duration-300
                                          {{ request()->routeIs('contact.*') ? 'text-white' : 'text-gray-300 hover:text-gray-100' }}">
                @phrase('nav.contact.label', 'Contact')
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
