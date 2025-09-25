<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin | {{ config('app.name', 'Point of Madness') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-950 text-white min-h-screen">
        <div class="min-h-screen flex flex-col">
            <header class="bg-slate-900 border-b border-slate-800">
                <div class="max-w-6xl mx-auto px-6 py-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h1 class="text-xl font-semibold">Admin | {{ config('app.name', 'Point of Madness') }}</h1>
                        <p class="text-sm text-slate-400">Beheer de inhoud van de website.</p>
                    </div>
                    <nav class="flex flex-wrap gap-3 text-sm">
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-amber-400 transition">Dashboard</a>
                        <a href="{{ route('admin.users.index') }}" class="hover:text-amber-400 transition">Gebruikers</a>
                        <a href="{{ route('admin.media.index') }}" class="hover:text-amber-400 transition">Media</a>
                        <a href="{{ route('admin.links.index') }}" class="hover:text-amber-400 transition">Links</a>
                        <a href="{{ route('admin.events.index') }}" class="hover:text-amber-400 transition">Events</a>
                        <a href="{{ route('admin.phrases.index') }}" class="hover:text-amber-400 transition">Teksten</a>
                        <a href="{{ route('index') }}" class="hover:text-amber-400 transition" target="_blank" rel="noopener">Bekijk site</a>
                    </nav>
                </div>
            </header>

            <main class="flex-1">
                <div class="max-w-6xl mx-auto px-6 py-8 space-y-6">
                    @include('admin.partials.flash')
                    {{ $slot }}
                </div>
            </main>

            <footer class="bg-slate-900 border-t border-slate-800">
                <div class="max-w-6xl mx-auto px-6 py-4 text-sm text-slate-500 flex justify-between">
                    <span>&copy; {{ date('Y') }} Point of Madness</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:text-amber-400 transition">Uitloggen</button>
                    </form>
                </div>
            </footer>
        </div>
    </body>
</html>
