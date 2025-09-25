<x-admin-layout>
    <!-- Page Header -->
    <div class="relative mb-8 overflow-hidden">
        <div class="bg-gray-800/70 backdrop-blur-sm border border-gray-600/50 rounded-2xl p-6 shadow-2xl shadow-black/50">
            <div class="absolute -inset-1 bg-gradient-to-r from-blue-600/20 via-purple-600/30 to-blue-600/20 rounded-2xl blur-xl opacity-50"></div>
            <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500/20 to-blue-600/20 border border-blue-500/30 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-400 via-purple-400 to-gray-300 bg-clip-text text-transparent">
                            Gebruikersbeheer
                        </h2>
                        <p class="text-gray-400">Beheer alle geregistreerde gebruikers van het systeem</p>
                    </div>
                </div>
                <a href="{{ route('admin.users.create') }}"
                   class="group inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600
                          text-white font-semibold rounded-xl hover:from-blue-500 hover:to-purple-500
                          transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:shadow-blue-500/30">
                    <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Nieuwe gebruiker
                </a>
            </div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="relative overflow-hidden">
        <div class="absolute -inset-1 bg-gradient-to-r from-blue-600/10 via-purple-600/20 to-blue-600/10 rounded-2xl blur-xl opacity-50"></div>
        <div class="relative bg-gray-800/70 backdrop-blur-sm border border-gray-600/50 rounded-2xl overflow-hidden shadow-2xl shadow-black/50">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="bg-gray-900/80 border-b border-gray-700/50">
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Naam
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    E-mail
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Aangemaakt
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
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-700/30 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500/20 to-purple-500/20 border border-blue-500/30 rounded-lg flex items-center justify-center">
                                            <span class="text-blue-400 font-semibold text-sm">{{ substr($user->name, 0, 1) }}</span>
                                        </div>
                                        <span class="font-medium text-white">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-300">{{ $user->email }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-500/10 border border-green-500/30 text-green-400 rounded-lg text-xs">
                                        <div class="w-1.5 h-1.5 bg-green-500 rounded-full"></div>
                                        {{ $user->created_at->format('d-m-Y') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                           class="inline-flex items-center gap-1 px-3 py-1.5 bg-gradient-to-r from-blue-500/20 to-purple-500/20
                                                  border border-blue-500/30 text-blue-300 hover:text-blue-200 hover:border-blue-400
                                                  hover:bg-blue-500/10 rounded-lg transition-all duration-300 text-xs font-medium">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Bewerken
                                        </a>
                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                              onsubmit="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?');"
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
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-4">
                                        <div class="w-16 h-16 bg-gradient-to-br from-gray-600/20 to-gray-700/20 border border-gray-600/30 rounded-2xl flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-gray-400 font-medium">Nog geen gebruikers beschikbaar</p>
                                            <p class="text-gray-500 text-sm mt-1">Voeg je eerste gebruiker toe om te beginnen</p>
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
    @if($users->hasPages())
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    @endif
</x-admin-layout>
