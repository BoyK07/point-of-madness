@extends('admin.layout')

@section('content')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Media</h1>
            <p class="mt-1 text-sm text-slate-500">Upload images used throughout the site. Files are optimized asynchronously.</p>
        </div>
        <a href="{{ route('admin.media.create') }}" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Upload media</a>
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-2">
        @foreach($media as $item)
            <div class="flex flex-col overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                @if($item->url)
                    <img src="{{ $item->versioned_url }}" alt="{{ $item->alt }}" class="h-56 w-full object-cover" />
                @endif
                <div class="space-y-2 p-5 text-sm">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-slate-800">{{ $item->purpose }}</h2>
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">v{{ $item->version }}</span>
                    </div>
                    <p class="text-slate-500">Alt text: {{ $item->alt ?: '—' }}</p>
                    <p class="text-slate-500">Disk: {{ $item->disk }} · Path: {{ $item->path }}</p>
                    <p class="text-slate-500">Dimensions: {{ $item->width ? $item->width.'×'.$item->height : 'pending' }}</p>
                    <div class="flex justify-end gap-3 pt-3">
                        <a href="{{ route('admin.media.edit', $item) }}" class="text-sm font-medium text-slate-900 hover:text-slate-600">Edit</a>
                        <form action="{{ route('admin.media.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-500" onclick="return confirm('Delete this media asset?');">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
