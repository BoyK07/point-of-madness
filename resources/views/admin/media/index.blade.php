<x-admin-layout>
    <!-- Page Header -->
    <div class="relative mb-8 overflow-hidden">
        <div class="bg-gray-800/70 backdrop-blur-sm border border-gray-600/50 rounded-2xl p-6 shadow-2xl shadow-black/50">
            <div class="absolute -inset-1 bg-gradient-to-r from-purple-600/20 via-pink-600/30 to-purple-600/20 rounded-2xl blur-xl opacity-50"></div>
            <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500/20 to-purple-600/20 border border-purple-500/30 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold bg-gradient-to-r from-purple-400 via-pink-400 to-gray-300 bg-clip-text text-transparent">
                            Media Beheer
                        </h2>
                        <p class="text-gray-400">Beheer alle afbeeldingen en media bestanden</p>
                    </div>
                </div>
                <a href="{{ route('admin.media.create') }}"
                   class="group inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600
                          text-white font-semibold rounded-xl hover:from-purple-500 hover:to-pink-500
                          transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:shadow-purple-500/30">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    Nieuwe upload
                </a>
            </div>
        </div>
    </div>

    <!-- Media Table -->
    <div class="relative overflow-hidden">
        <div class="absolute -inset-1 bg-gradient-to-r from-purple-600/10 via-pink-600/20 to-purple-600/10 rounded-2xl blur-xl opacity-50"></div>
        <div class="relative bg-gray-800/70 backdrop-blur-sm border border-gray-600/50 rounded-2xl overflow-hidden shadow-2xl shadow-black/50">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="bg-gray-900/80 border-b border-gray-700/50">
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Voorbeeld
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Doel
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                    </svg>
                                    Alt Tekst
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                        @forelse($media as $item)
                            <tr class="hover:bg-gray-700/30 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="relative group">
                                        <div class="w-20 h-16 bg-gradient-to-br from-gray-700/50 to-gray-800/50 border border-gray-600/50 rounded-lg overflow-hidden">
                                            <img src="{{ $item->url }}" alt="{{ $item->alt }}"
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                        </div>
                                        <!-- Preview overlay on hover -->
                                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 px-2 py-1 bg-blue-500/10 border border-blue-500/30 text-blue-400 rounded-lg text-xs font-mono">
                                        <div class="w-1.5 h-1.5 bg-blue-500 rounded-full"></div>
                                        {{ $item->purpose }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-gray-300 max-w-xs truncate block">{{ $item->alt }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 px-2 py-1 bg-indigo-500/10 border border-indigo-500/30 text-indigo-400 rounded-lg text-xs">
                                        <div class="w-1.5 h-1.5 bg-indigo-500 rounded-full"></div>
                                        v{{ $item->version }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <a href="{{ route('admin.media.edit', $item) }}"
                                           class="inline-flex items-center gap-1 px-3 py-1.5 bg-gradient-to-r from-purple-500/20 to-pink-500/20
                                                  border border-purple-500/30 text-purple-300 hover:text-purple-200 hover:border-purple-400
                                                  hover:bg-purple-500/10 rounded-lg transition-all duration-300 text-xs font-medium">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Bewerken
                                        </a>
                                        <form method="POST" action="{{ route('admin.media.destroy', $item) }}"
                                              onsubmit="return confirm('Weet je zeker dat je dit item wilt verwijderen?');"
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-gray-400 font-medium">Nog geen media beschikbaar</p>
                                            <p class="text-gray-500 text-sm mt-1">Upload je eerste afbeelding om te beginnen</p>
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
    @if($media->hasPages())
        <div class="mt-6">
            {{ $media->links() }}
        </div>
    @endif
</x-admin-layout>
