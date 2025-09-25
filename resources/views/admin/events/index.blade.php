<x-admin-layout>
    <!-- Page Header -->
    <div class="relative mb-8 overflow-hidden">
        <div class="bg-gray-800/70 backdrop-blur-sm border border-gray-600/50 rounded-2xl p-6 shadow-2xl shadow-black/50">
            <div class="absolute -inset-1 bg-gradient-to-r from-orange-600/20 via-red-600/30 to-orange-600/20 rounded-2xl blur-xl opacity-50"></div>
            <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500/20 to-orange-600/20 border border-orange-500/30 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold bg-gradient-to-r from-orange-400 via-red-400 to-gray-300 bg-clip-text text-transparent">
                            Events Beheer
                        </h2>
                        <p class="text-gray-400">Beheer alle geplande evenementen en optredens</p>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-3 md:items-center">
                    <form method="GET" action="{{ route('admin.events.index') }}" class="flex items-center gap-2">
                        <div class="relative">
                            <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Zoek op titel of locatie"
                                   class="w-64 md:w-80 rounded-xl bg-gray-900/70 border border-gray-700/60 text-gray-200 placeholder-gray-500 px-10 py-2 focus:outline-none focus:border-orange-500/60 focus:ring-0">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                        </div>
                        @if(!empty($search))
                            <a href="{{ route('admin.events.index') }}" class="px-3 py-2 rounded-lg bg-gray-800/70 border border-gray-700/60 text-gray-300 hover:text-white hover:border-gray-500 transition">Wissen</a>
                        @endif
                        <button type="submit"
                                class="px-4 py-2 rounded-lg bg-gradient-to-r from-orange-600 to-red-600 text-white font-semibold hover:from-orange-500 hover:to-red-500 transition">
                            Zoeken
                        </button>
                    </form>

                    <a href="{{ route('admin.events.create') }}"
                       class="group inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-orange-600 to-red-600
                              text-white font-semibold rounded-xl hover:from-orange-500 hover:to-red-500
                              transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:shadow-orange-500/30">
                        <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Nieuw event
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Events Table -->
    <div class="relative overflow-hidden">
        <div class="absolute -inset-1 bg-gradient-to-r from-orange-600/10 via-red-600/20 to-orange-600/10 rounded-2xl blur-xl opacity-50"></div>
        <div class="relative bg-gray-800/70 backdrop-blur-sm border border-gray-600/50 rounded-2xl overflow-hidden shadow-2xl shadow-black/50">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="bg-gray-900/80 border-b border-gray-700/50">
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                    </svg>
                                    Titel
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Start
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Locatie
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Media
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Acties
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700/50">
                        @forelse($events as $event)
                            <tr class="hover:bg-gray-700/30 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <span class="font-medium text-white">{{ $event->title }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-500/10 border border-green-500/30 text-green-400 rounded-lg text-xs">
                                        <div class="w-1.5 h-1.5 bg-green-500 rounded-full"></div>
                                        {{ $event->starts_at->format('d-m-Y H:i') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-300">{{ $event->location ?? '—' }}</td>
                                <td class="px-6 py-4">
                                    @if($event->media?->purpose)
                                        <span class="inline-flex items-center gap-1 px-2 py-1 bg-blue-500/10 border border-blue-500/30 text-blue-400 rounded-lg text-xs font-mono">
                                            <div class="w-1.5 h-1.5 bg-blue-500 rounded-full"></div>
                                            {{ $event->media->purpose }}
                                        </span>
                                    @else
                                        <span class="text-gray-500">—</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <a href="{{ route('admin.events.edit', $event) }}"
                                           class="inline-flex items-center gap-1 px-3 py-1.5 bg-gradient-to-r from-orange-500/20 to-red-500/20
                                                  border border-orange-500/30 text-orange-300 hover:text-orange-200 hover:border-orange-400
                                                  hover:bg-orange-500/10 rounded-lg transition-all duration-300 text-xs font-medium">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Bewerken
                                        </a>
                                        <form method="POST" action="{{ route('admin.events.destroy', $event) }}"
                                              onsubmit="return confirm('Weet je zeker dat je dit event wilt verwijderen?');"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center gap-1 px-3 py-1.5 bg-gradient-to-r from-red-500/20 to-pink-500/20
                                                           border border-red-500/30 text-red-300 hover:text-red-200 hover:border-red-400
                                                           hover:bg-red-500/10 rounded-lg transition-all duration-300 text-xs font-medium">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Verwijderen
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-4">
                                        <div class="w-16 h-16 bg-gradient-to-br from-gray-600/20 to-gray-700/20 border border-gray-600/30 rounded-2xl flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-gray-400 font-medium">Nog geen events gepland</p>
                                            <p class="text-gray-500 text-sm mt-1">Plan je eerste evenement om te beginnen</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    @if($events->hasPages())
        <div class="mt-6">
            {{ $events->links() }}
        </div>
    @endif
</x-admin-layout>
