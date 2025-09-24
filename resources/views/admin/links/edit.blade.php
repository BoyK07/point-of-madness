@extends('admin.layout')

@section('content')
    <div class="max-w-3xl">
        <h1 class="text-2xl font-semibold text-slate-900">Edit link</h1>
        <p class="mt-1 text-sm text-slate-500">Adjust copy, ordering, or visibility.</p>

        <form action="{{ route('admin.links.update', $link) }}" method="POST" class="mt-6 space-y-5">
            @csrf
            @method('PUT')
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="label">Label</label>
                    <input type="text" name="label" id="label" value="{{ old('label', $link->label) }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="key">Key/slug</label>
                    <input type="text" name="key" id="key" value="{{ old('key', $link->key) }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none" required>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700" for="url">URL</label>
                <input type="url" name="url" id="url" value="{{ old('url', $link->url) }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none" required>
            </div>
            <div class="grid gap-5 md:grid-cols-3">
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="group">Group</label>
                    <input type="text" name="group" id="group" value="{{ old('group', $link->group) }}" list="link-groups" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none" required>
                    <datalist id="link-groups">
                        @foreach($groups as $group)
                            <option value="{{ $group }}"></option>
                        @endforeach
                    </datalist>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="order">Order</label>
                    <input type="number" name="order" id="order" value="{{ old('order', $link->order) }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="target">Target</label>
                    <input type="text" name="target" id="target" value="{{ old('target', $link->target) }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700" for="rel">Rel attribute</label>
                <input type="text" name="rel" id="rel" value="{{ old('rel', $link->rel) }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">
            </div>
            <div class="flex items-center gap-2">
                <input type="hidden" name="visible" value="0">
                <input type="checkbox" name="visible" id="visible" value="1" class="h-4 w-4 rounded border-slate-300 text-slate-900 focus:ring-slate-500" {{ old('visible', $link->visible) ? 'checked' : '' }}>
                <label for="visible" class="text-sm text-slate-700">Visible on frontend</label>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Save changes</button>
                <a href="{{ route('admin.links.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-800">Cancel</a>
            </div>
        </form>
    </div>
@endsection
