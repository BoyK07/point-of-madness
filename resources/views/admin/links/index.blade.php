<x-admin-layout>
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-semibold">Links</h2>
        <a href="{{ route('admin.links.create') }}" class="inline-flex items-center gap-2 rounded bg-amber-500 px-4 py-2 text-sm font-semibold text-slate-900 hover:bg-amber-400">Nieuwe link</a>
    </div>

    <div class="overflow-x-auto bg-slate-900/60 border border-slate-800 rounded-lg">
        <table class="min-w-full divide-y divide-slate-800 text-sm">
            <thead class="bg-slate-900/80">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold">Label</th>
                    <th class="px-4 py-3 text-left font-semibold">Slug</th>
                    <th class="px-4 py-3 text-left font-semibold">Groep</th>
                    <th class="px-4 py-3 text-left font-semibold">URL</th>
                    <th class="px-4 py-3 text-left font-semibold">Zichtbaar</th>
                    <th class="px-4 py-3 text-left font-semibold">Acties</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @forelse($links as $link)
                    <tr>
                        <td class="px-4 py-3">{{ $link->label }}</td>
                        <td class="px-4 py-3 font-mono text-xs">{{ $link->slug }}</td>
                        <td class="px-4 py-3">{{ $link->group ?? '—' }}</td>
                        <td class="px-4 py-3 truncate max-w-xs"><a href="{{ $link->url }}" class="text-amber-300 hover:text-amber-200" target="_blank" rel="noopener">{{ $link->url }}</a></td>
                        <td class="px-4 py-3">{{ $link->visible ? 'Ja' : 'Nee' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.links.edit', $link) }}" class="text-amber-300 hover:text-amber-200">Bewerken</a>
                                <form method="POST" action="{{ route('admin.links.destroy', $link) }}" onsubmit="return confirm('Weet je zeker dat je deze link wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">Verwijderen</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-slate-400">Nog geen links beschikbaar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $links->links() }}
    </div>
</x-admin-layout>
