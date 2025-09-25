<div class="grid gap-4 md:grid-cols-2">
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Doel (unieke sleutel)</span>
        <input type="text" name="purpose" value="{{ old('purpose', $media->purpose ?? '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" required>
        <span class="text-xs text-slate-400">Gebruik korte, herkenbare sleutels zoals <code>hero.background</code>.</span>
    </label>
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Alt-tekst</span>
        <input type="text" name="alt" value="{{ old('alt', $media->alt ?? '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white">
    </label>
</div>
<div class="grid gap-4 md:grid-cols-2">
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Focal point X (0 - 1)</span>
        <input type="number" step="0.01" min="0" max="1" name="focal_point[x]" value="{{ old('focal_point.x', $media->focal_point['x'] ?? '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white">
    </label>
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Focal point Y (0 - 1)</span>
        <input type="number" step="0.01" min="0" max="1" name="focal_point[y]" value="{{ old('focal_point.y', $media->focal_point['y'] ?? '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white">
    </label>
</div>
<label class="flex flex-col gap-2">
    <span class="text-sm font-semibold">Bestand @if(isset($media) && $media->exists)<span class="text-xs text-slate-400">(laat leeg om huidige versie te behouden)</span>@endif</span>
    <input type="file" name="file" @if(!isset($media) || !$media->exists) required @endif accept="image/*" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white">
</label>
@if(isset($media) && $media->exists)
    <div class="bg-slate-900/60 border border-slate-800 rounded-lg p-4">
        <p class="text-sm text-slate-400 mb-2">Huidige versie:</p>
        <img src="{{ $media->url }}" alt="{{ $media->alt }}" class="max-h-48 rounded">
        <p class="text-xs text-slate-500 mt-2">Versie {{ $media->version }} · {{ $media->mime_type }} · {{ $media->width }}x{{ $media->height }}</p>
    </div>
@endif
<div class="flex flex-wrap justify-end gap-3">
    <a href="{{ route('admin.media.index') }}" class="px-4 py-2 rounded border border-slate-700 text-slate-300 hover:border-slate-500 w-full sm:w-auto text-center">Annuleren</a>
    <button type="submit" class="px-4 py-2 rounded bg-amber-500 text-slate-900 font-semibold hover:bg-amber-400 w-full sm:w-auto">Opslaan</button>
</div>
