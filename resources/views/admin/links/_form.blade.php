<div class="grid gap-4 md:grid-cols-2">
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Slug</span>
        <input type="text" name="slug" value="{{ old('slug', $link->slug ?? '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" required>
    </label>
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Label</span>
        <input type="text" name="label" value="{{ old('label', $link->label ?? '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" required>
    </label>
</div>
<label class="flex flex-col gap-2">
    <span class="text-sm font-semibold">URL</span>
    <input type="url" name="url" value="{{ old('url', $link->url ?? '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" required>
</label>
<div class="grid gap-4 md:grid-cols-3">
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Target</span>
        <select name="target" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white">
            <option value="_self" @selected(old('target', $link->target ?? '_self') === '_self')>Zelfde tab</option>
            <option value="_blank" @selected(old('target', $link->target ?? '_self') === '_blank')>Nieuw tabblad</option>
        </select>
    </label>
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">rel-attribuut</span>
        <input type="text" name="rel" value="{{ old('rel', $link->rel ?? '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" placeholder="bijv. noopener">
    </label>
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Volgorde</span>
        <input type="number" name="order" value="{{ old('order', $link->order ?? 0) }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" min="0">
    </label>
</div>
<div class="grid gap-4 md:grid-cols-2">
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Groep</span>
        <input type="text" name="group" value="{{ old('group', $link->group ?? '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" placeholder="bijv. nav of footer">
    </label>
    <label class="flex items-center gap-2 mt-6">
        <input type="hidden" name="visible" value="0">
        <input type="checkbox" name="visible" value="1" @checked(old('visible', $link->visible ?? true)) class="h-4 w-4 rounded border-slate-700 bg-slate-950">
        <span class="text-sm">Link zichtbaar op de website</span>
    </label>
</div>
<div class="flex justify-end gap-3">
    <a href="{{ route('admin.links.index') }}" class="px-4 py-2 rounded border border-slate-700 text-slate-300 hover:border-slate-500">Annuleren</a>
    <button type="submit" class="px-4 py-2 rounded bg-amber-500 text-slate-900 font-semibold hover:bg-amber-400">Opslaan</button>
</div>
