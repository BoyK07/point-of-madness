@extends('admin.layout')

@section('content')
    <div class="max-w-3xl">
        <h1 class="text-2xl font-semibold text-slate-900">Edit media</h1>
        <p class="mt-1 text-sm text-slate-500">Replace the file to bump the cached version automatically.</p>

        <div class="mt-6 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            @if($media->url)
                <img src="{{ $media->versioned_url }}" alt="{{ $media->alt }}" class="h-60 w-full object-cover" />
            @endif
            <dl class="grid gap-4 p-5 text-sm text-slate-600 md:grid-cols-2">
                <div>
                    <dt class="font-semibold text-slate-500">Purpose</dt>
                    <dd>{{ $media->purpose }}</dd>
                </div>
                <div>
                    <dt class="font-semibold text-slate-500">Version</dt>
                    <dd>v{{ $media->version }}</dd>
                </div>
                <div>
                    <dt class="font-semibold text-slate-500">Dimensions</dt>
                    <dd>{{ $media->width ? $media->width.'×'.$media->height : 'Pending optimization' }}</dd>
                </div>
                <div>
                    <dt class="font-semibold text-slate-500">Hash</dt>
                    <dd class="truncate">{{ $media->hash ?: 'Pending' }}</dd>
                </div>
            </dl>
        </div>

        <form action="{{ route('admin.media.update', $media) }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-5">
            @csrf
            @method('PUT')
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="purpose">Purpose</label>
                    <input type="text" name="purpose" id="purpose" value="{{ old('purpose', $media->purpose) }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="disk">Disk</label>
                    <select name="disk" id="disk" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">
                        <option value="public" {{ old('disk', $media->disk) === 'public' ? 'selected' : '' }}>public</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700" for="alt">Alt text</label>
                <input type="text" name="alt" id="alt" value="{{ old('alt', $media->alt) }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">
            </div>
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="focal_x">Focal point X (%)</label>
                    <input type="number" name="focal_x" id="focal_x" value="{{ old('focal_x', $media->focal_x) }}" step="0.1" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="focal_y">Focal point Y (%)</label>
                    <input type="number" name="focal_y" id="focal_y" value="{{ old('focal_y', $media->focal_y) }}" step="0.1" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700" for="file">Replace image</label>
                <input type="file" name="file" id="file" class="mt-1 w-full rounded-md border border-dashed border-slate-300 px-3 py-6 text-sm focus:border-slate-500 focus:outline-none">
                <p class="mt-2 text-xs text-slate-500">Leave empty to keep the current file.</p>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Save changes</button>
                <a href="{{ route('admin.media.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-800">Cancel</a>
            </div>
        </form>
    </div>
@endsection
