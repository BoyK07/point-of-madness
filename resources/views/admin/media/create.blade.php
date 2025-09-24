@extends('admin.layout')

@section('content')
    <div class="max-w-3xl">
        <h1 class="text-2xl font-semibold text-slate-900">Upload media</h1>
        <p class="mt-1 text-sm text-slate-500">Purposes are unique keys that power the SSOT helpers.</p>

        <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-5">
            @csrf
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="purpose">Purpose</label>
                    <input type="text" name="purpose" id="purpose" value="{{ old('purpose') }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none" placeholder="e.g. homepage.hero" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="disk">Disk</label>
                    <select name="disk" id="disk" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">
                        <option value="public" {{ old('disk') === 'public' ? 'selected' : '' }}>public</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700" for="alt">Alt text</label>
                <input type="text" name="alt" id="alt" value="{{ old('alt') }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">
            </div>
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="focal_x">Focal point X (%)</label>
                    <input type="number" name="focal_x" id="focal_x" value="{{ old('focal_x') }}" step="0.1" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none" placeholder="0-100">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="focal_y">Focal point Y (%)</label>
                    <input type="number" name="focal_y" id="focal_y" value="{{ old('focal_y') }}" step="0.1" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none" placeholder="0-100">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700" for="file">Image file</label>
                <input type="file" name="file" id="file" class="mt-1 w-full rounded-md border border-dashed border-slate-300 px-3 py-6 text-sm focus:border-slate-500 focus:outline-none" required>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Upload</button>
                <a href="{{ route('admin.media.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-800">Cancel</a>
            </div>
        </form>
    </div>
@endsection
