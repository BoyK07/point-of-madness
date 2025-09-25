<x-admin-layout>
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <div class="rounded-lg border border-slate-800 bg-slate-900/60 p-6">
            <p class="text-sm text-slate-400">Gebruikers</p>
            <p class="text-3xl font-semibold mt-2">{{ $userCount }}</p>
        </div>
        <div class="rounded-lg border border-slate-800 bg-slate-900/60 p-6">
            <p class="text-sm text-slate-400">Media</p>
            <p class="text-3xl font-semibold mt-2">{{ $mediaCount }}</p>
        </div>
        <div class="rounded-lg border border-slate-800 bg-slate-900/60 p-6">
            <p class="text-sm text-slate-400">Links</p>
            <p class="text-3xl font-semibold mt-2">{{ $linkCount }}</p>
        </div>
        <div class="rounded-lg border border-slate-800 bg-slate-900/60 p-6">
            <p class="text-sm text-slate-400">Events</p>
            <p class="text-3xl font-semibold mt-2">{{ $eventCount }}</p>
        </div>
        <div class="rounded-lg border border-slate-800 bg-slate-900/60 p-6">
            <p class="text-sm text-slate-400">Teksten</p>
            <p class="text-3xl font-semibold mt-2">{{ $phraseCount }}</p>
        </div>
    </div>
    <div class="bg-slate-900/60 border border-slate-800 rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Snelle acties</h2>
        <div class="grid gap-3 md:grid-cols-2 lg:grid-cols-3 text-sm">
            <a href="{{ route('admin.phrases.create') }}" class="bg-amber-500/10 border border-amber-500/40 hover:border-amber-400 hover:bg-amber-400/20 transition rounded px-4 py-3">Nieuwe tekst toevoegen</a>
            <a href="{{ route('admin.media.create') }}" class="bg-amber-500/10 border border-amber-500/40 hover:border-amber-400 hover:bg-amber-400/20 transition rounded px-4 py-3">Nieuwe afbeelding uploaden</a>
            <a href="{{ route('admin.events.create') }}" class="bg-amber-500/10 border border-amber-500/40 hover:border-amber-400 hover:bg-amber-400/20 transition rounded px-4 py-3">Nieuw event plannen</a>
        </div>
    </div>
</x-admin-layout>
