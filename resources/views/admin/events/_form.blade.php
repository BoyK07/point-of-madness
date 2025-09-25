<div class="grid gap-4 md:grid-cols-2">
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Titel</span>
        <input type="text" name="title" value="{{ old('title', $event->title ?? '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" required>
    </label>
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Locatie</span>
        <input type="text" name="location" value="{{ old('location', $event->location ?? '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" placeholder="Bijv. Paradiso, Amsterdam">
    </label>
</div>
<div class="grid gap-4 md:grid-cols-2">
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Startdatum en tijd</span>
        <input type="datetime-local" name="starts_at" value="{{ old('starts_at', isset($event) && $event->starts_at ? $event->starts_at->format('Y-m-d\TH:i') : '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" required>
    </label>
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Einddatum en tijd</span>
        <input type="datetime-local" name="ends_at" value="{{ old('ends_at', isset($event) && $event->ends_at ? $event->ends_at->format('Y-m-d\TH:i') : '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white">
    </label>
</div>
<label class="flex flex-col gap-2">
    <span class="text-sm font-semibold">Omschrijving</span>
    <textarea name="description" rows="4" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white">{{ old('description', $event->description ?? '') }}</textarea>
</label>
<div class="grid gap-4 md:grid-cols-2">
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Media (optioneel)</span>
        <select name="media_id" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white">
            <option value="">Geen afbeelding</option>
            @foreach($mediaOptions as $media)
                <option value="{{ $media->id }}" @selected(old('media_id', $event->media_id ?? '') == $media->id)>{{ $media->purpose }}</option>
            @endforeach
        </select>
    </label>
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Link (optioneel)</span>
        <select name="link_id" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white">
            <option value="">Geen link</option>
            @foreach($linkOptions as $link)
                <option value="{{ $link->id }}" @selected(old('link_id', $event->link_id ?? '') == $link->id)>{{ $link->label }}</option>
            @endforeach
        </select>
    </label>
</div>
<div class="flex justify-end gap-3">
    <a href="{{ route('admin.events.index') }}" class="px-4 py-2 rounded border border-slate-700 text-slate-300 hover:border-slate-500">Annuleren</a>
    <button type="submit" class="px-4 py-2 rounded bg-amber-500 text-slate-900 font-semibold hover:bg-amber-400">Opslaan</button>
</div>
