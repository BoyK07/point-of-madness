<x-admin-layout>
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-semibold">Events</h2>
        <a href="{{ route('admin.events.create') }}" class="inline-flex items-center gap-2 rounded bg-amber-500 px-4 py-2 text-sm font-semibold text-slate-900 hover:bg-amber-400">Nieuw event</a>
    </div>

    <div class="overflow-x-auto bg-slate-900/60 border border-slate-800 rounded-lg">
        <table class="min-w-full divide-y divide-slate-800 text-sm">
            <thead class="bg-slate-900/80">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold">Titel</th>
                    <th class="px-4 py-3 text-left font-semibold">Start</th>
                    <th class="px-4 py-3 text-left font-semibold">Locatie</th>
                    <th class="px-4 py-3 text-left font-semibold">Media</th>
                    <th class="px-4 py-3 text-left font-semibold">Acties</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @forelse($events as $event)
                    <tr>
                        <td class="px-4 py-3">{{ $event->title }}</td>
                        <td class="px-4 py-3">{{ $event->starts_at->format('d-m-Y H:i') }}</td>
                        <td class="px-4 py-3">{{ $event->location ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $event->media?->purpose ?? '—' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.events.edit', $event) }}" class="text-amber-300 hover:text-amber-200">Bewerken</a>
                                <form method="POST" action="{{ route('admin.events.destroy', $event) }}" onsubmit="return confirm('Weet je zeker dat je dit event wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">Verwijderen</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-slate-400">Nog geen events gepland.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $events->links() }}
    </div>
</x-admin-layout>
