<x-admin-layout>
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-semibold">Media</h2>
        <a href="{{ route('admin.media.create') }}" class="inline-flex items-center gap-2 rounded bg-amber-500 px-4 py-2 text-sm font-semibold text-slate-900 hover:bg-amber-400">Nieuwe upload</a>
    </div>

    <div class="overflow-x-auto bg-slate-900/60 border border-slate-800 rounded-lg">
        <table class="min-w-full divide-y divide-slate-800 text-sm">
            <thead class="bg-slate-900/80">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold">Voorbeeld</th>
                    <th class="px-4 py-3 text-left font-semibold">Doel</th>
                    <th class="px-4 py-3 text-left font-semibold">Alt</th>
                    <th class="px-4 py-3 text-left font-semibold">Versie</th>
                    <th class="px-4 py-3 text-left font-semibold">Acties</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @forelse($media as $item)
                    <tr>
                        <td class="px-4 py-3">
                            <img src="{{ $item->url }}" alt="{{ $item->alt }}" class="h-16 w-24 object-cover rounded">
                        </td>
                        <td class="px-4 py-3 font-mono text-xs">{{ $item->purpose }}</td>
                        <td class="px-4 py-3">{{ $item->alt }}</td>
                        <td class="px-4 py-3">v{{ $item->version }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.media.edit', $item) }}" class="text-amber-300 hover:text-amber-200">Bewerken</a>
                                <form method="POST" action="{{ route('admin.media.destroy', $item) }}" onsubmit="return confirm('Weet je zeker dat je dit item wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">Verwijderen</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-slate-400">Nog geen media beschikbaar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $media->links() }}
    </div>
</x-admin-layout>
