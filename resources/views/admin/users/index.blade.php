<x-admin-layout>
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-semibold">Gebruikersbeheer</h2>
        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 rounded bg-amber-500 px-4 py-2 text-sm font-semibold text-slate-900 hover:bg-amber-400">Nieuwe gebruiker</a>
    </div>

    <div class="overflow-x-auto bg-slate-900/60 border border-slate-800 rounded-lg">
        <table class="min-w-full divide-y divide-slate-800 text-sm">
            <thead class="bg-slate-900/80">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold">Naam</th>
                    <th class="px-4 py-3 text-left font-semibold">E-mail</th>
                    <th class="px-4 py-3 text-left font-semibold">Aangemaakt</th>
                    <th class="px-4 py-3 text-left font-semibold">Acties</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @forelse($users as $user)
                    <tr>
                        <td class="px-4 py-3">{{ $user->name }}</td>
                        <td class="px-4 py-3">{{ $user->email }}</td>
                        <td class="px-4 py-3">{{ $user->created_at->format('d-m-Y') }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.users.edit', $user) }}" class="text-amber-300 hover:text-amber-200">Bewerken</a>
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">Verwijderen</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-slate-400">Nog geen gebruikers beschikbaar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $users->links() }}
    </div>
</x-admin-layout>
