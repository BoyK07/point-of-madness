@extends('admin.layout')

@section('content')
    <div class="max-w-3xl">
        <h1 class="text-2xl font-semibold text-slate-900">Edit phrase</h1>
        <p class="mt-1 text-sm text-slate-500">Updating a phrase increments its version and invalidates the cache.</p>

        <form action="{{ route('admin.phrases.update', $phrase) }}" method="POST" class="mt-6 space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-slate-700" for="key">Key</label>
                <input type="text" name="key" id="key" value="{{ old('key', $phrase->key) }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700" for="text">Text</label>
                <textarea name="text" id="text" rows="4" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none" required>{{ old('text', $phrase->text) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700" for="context">Context (notes)</label>
                <textarea name="context" id="context" rows="2" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">{{ old('context', $phrase->context) }}</textarea>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Save changes</button>
                <a href="{{ route('admin.phrases.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-800">Cancel</a>
            </div>
        </form>
    </div>
@endsection
