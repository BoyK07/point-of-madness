<x-admin-layout>
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-semibold">Teksten</h2>
        <a href="{{ route('admin.phrases.create') }}" class="inline-flex items-center gap-2 rounded bg-amber-500 px-4 py-2 text-sm font-semibold text-slate-900 hover:bg-amber-400">Nieuwe tekst</a>
    </div>

    <div class="overflow-x-auto bg-slate-900/60 border border-slate-800 rounded-lg">
        <table class="min-w-full divide-y divide-slate-800 text-sm">
            <thead class="bg-slate-900/80">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold">Sleutel</th>
                    <th class="px-4 py-3 text-left font-semibold">Context</th>
                    <th class="px-4 py-3 text-left font-semibold">Tekst</th>
                    <th class="px-4 py-3 text-left font-semibold">Versie</th>
                    <th class="px-4 py-3 text-left font-semibold">Acties</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @forelse($phrases as $phrase)
                    <tr>
                        <td class="px-4 py-3 font-mono text-xs">{{ $phrase->key }}</td>
                        <td class="px-4 py-3">{{ $phrase->context ?? '—' }}</td>
                        <td class="px-4 py-3 max-w-md truncate" title="{{ $phrase->text }}">{{ $phrase->text }}</td>
                        <td class="px-4 py-3">v{{ $phrase->version }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.phrases.edit', $phrase) }}" class="text-amber-300 hover:text-amber-200">Bewerken</a>
                                <form method="POST" action="{{ route('admin.phrases.destroy', $phrase) }}" onsubmit="return confirm('Weet je zeker dat je deze tekst wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">Verwijderen</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-slate-400">Nog geen teksten beschikbaar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $phrases->links() }}
    </div>
</x-admin-layout>
