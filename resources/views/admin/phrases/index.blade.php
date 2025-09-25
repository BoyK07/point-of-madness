<x-admin-layout>
    <!-- Page Header -->
    <div class="relative mb-8 overflow-hidden">
        <div class="bg-gray-800/70 backdrop-blur-sm border border-gray-600/50 rounded-2xl p-6 shadow-2xl shadow-black/50">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-600/20 via-blue-600/30 to-indigo-600/20 rounded-2xl blur-xl opacity-50"></div>
            <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-500/20 to-indigo-600/20 border border-indigo-500/30 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold bg-gradient-to-r from-indigo-400 via-blue-400 to-gray-300 bg-clip-text text-transparent">
                            Teksten Beheer
                        </h2>
                        <p class="text-gray-400">Beheer alle teksten en vertalingen voor de website</p>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-3 md:items-center">
                    <form method="GET" action="{{ route('admin.phrases.index') }}" class="flex items-center gap-2">
                        <div class="relative">
                            <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Zoek in tekst, sleutel of context"
                                   class="w-64 md:w-96 rounded-xl bg-gray-900/70 border border-gray-700/60 text-gray-200 placeholder-gray-500 px-10 py-2 focus:outline-none focus:border-indigo-500/60 focus:ring-0">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                        </div>
                        @if(!empty($search))
                            <a href="{{ route('admin.phrases.index') }}" class="px-3 py-2 rounded-lg bg-gray-800/70 border border-gray-700/60 text-gray-300 hover:text-white hover:border-gray-500 transition">Wissen</a>
                        @endif
                        <button type="submit"
                                class="px-4 py-2 rounded-lg bg-gradient-to-r from-indigo-600 to-blue-600 text-white font-semibold hover:from-indigo-500 hover:to-blue-500 transition">
                            Zoeken
                        </button>
                    </form>

                    <a href="{{ route('admin.phrases.create') }}"
                       class="group inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-indigo-600 to-blue-600
                              text-white font-semibold rounded-xl hover:from-indigo-500 hover:to-blue-500
                              transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:shadow-indigo-500/30">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Nieuwe tekst
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Phrases Table -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600/10 via-blue-600/20 to-indigo-600/10 rounded-2xl blur-xl opacity-50"></div>
        <div class="relative bg-gray-800/70 backdrop-blur-sm border border-gray-600/50 rounded-2xl overflow-hidden shadow-2xl shadow-black/50">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="bg-gray-900/80 border-b border-gray-700/50">
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                                    </svg>
                                    Sleutel
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                    Context
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Tekst
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    Versie
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
                        @forelse($phrases as $phrase)
                            <tr class="hover:bg-gray-700/30 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 px-2 py-1 bg-indigo-500/10 border border-indigo-500/30 text-indigo-400 rounded-lg text-xs font-mono">
                                        <div class="w-1.5 h-1.5 bg-indigo-500 rounded-full"></div>
                                        {{ $phrase->key }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-300">{{ $phrase->context ?? '—' }}</td>
                                <td class="px-6 py-4">
                                    <div class="max-w-xl">
                                        <p class="text-white truncate" title="{{ $phrase->text }}">{{ $phrase->text }}</p>
                                        @if(strlen($phrase->text) > 50)
                                            <p class="text-gray-500 text-xs mt-1">{{ strlen($phrase->text) }} karakters</p>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 px-2 py-1 bg-yellow-500/10 border border-yellow-500/30 text-yellow-400 rounded-lg text-xs">
                                        <div class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></div>
                                        v{{ $phrase->version }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <a href="{{ route('admin.phrases.edit', $phrase) }}"
                                           class="inline-flex items-center gap-1 px-3 py-1.5 bg-gradient-to-r from-indigo-500/20 to-blue-500/20
                                                  border border-indigo-500/30 text-indigo-300 hover:text-indigo-200 hover:border-indigo-400
                                                  hover:bg-indigo-500/10 rounded-lg transition-all duration-300 text-xs font-medium">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Bewerken
                                        </a>
                                        <form method="POST" action="{{ route('admin.phrases.destroy', $phrase) }}"
                                              onsubmit="return confirm('Weet je zeker dat je deze tekst wilt verwijderen?');"
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-gray-400 font-medium">Nog geen teksten beschikbaar</p>
                                            <p class="text-gray-500 text-sm mt-1">Voeg je eerste tekst toe om te beginnen</p>
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
    @if($phrases->hasPages())
        <div class="mt-6 flex justify-center">
            <x-pagination :paginator="$phrases" />
        </div>
    @endif
</x-admin-layout>
