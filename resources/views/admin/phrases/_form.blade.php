<label class="flex flex-col gap-2">
    <span class="text-sm font-semibold">Sleutel</span>
    <input type="text" name="key" value="{{ old('key', $phrase->key ?? '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" required>
    <span class="text-xs text-slate-400">Gebruik een duidelijke naam zoals <code>home.hero.title</code>.</span>
</label>
<label class="flex flex-col gap-2">
    <span class="text-sm font-semibold">Tekst</span>
    <textarea name="text" rows="4" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" required>{{ old('text', $phrase->text ?? '') }}</textarea>
</label>
<label class="flex flex-col gap-2">
    <span class="text-sm font-semibold">Context (optioneel)</span>
    <input type="text" name="context" value="{{ old('context', $phrase->context ?? '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" placeholder="Waar wordt deze tekst getoond?">
</label>
<div class="flex justify-end gap-3">
    <a href="{{ route('admin.phrases.index') }}" class="px-4 py-2 rounded border border-slate-700 text-slate-300 hover:border-slate-500">Annuleren</a>
    <button type="submit" class="px-4 py-2 rounded bg-amber-500 text-slate-900 font-semibold hover:bg-amber-400">Opslaan</button>
</div>
