@extends('admin.layout')

@section('content')
    <div class="max-w-3xl">
        <h1 class="text-2xl font-semibold text-slate-900">Edit event</h1>
        <p class="mt-1 text-sm text-slate-500">Update schedules and supporting assets.</p>

        <form action="{{ route('admin.events.update', $event) }}" method="POST" class="mt-6 space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-slate-700" for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none" required>
            </div>
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="starts_at">Starts at</label>
                    <input type="datetime-local" name="starts_at" id="starts_at" value="{{ old('starts_at', $event->starts_at?->format('Y-m-d\TH:i')) }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="ends_at">Ends at</label>
                    <input type="datetime-local" name="ends_at" id="ends_at" value="{{ old('ends_at', $event->ends_at?->format('Y-m-d\TH:i')) }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700" for="location">Location</label>
                <input type="text" name="location" id="location" value="{{ old('location', $event->location) }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700" for="description">Description</label>
                <textarea name="description" id="description" rows="4" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">{{ old('description', $event->description) }}</textarea>
            </div>
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="media_id">Image</label>
                    <select name="media_id" id="media_id" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">
                        <option value="">No image</option>
                        @foreach($media as $item)
                            <option value="{{ $item->id }}" {{ old('media_id', $event->media_id) == $item->id ? 'selected' : '' }}>{{ $item->purpose }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="link_id">CTA link</label>
                    <select name="link_id" id="link_id" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">
                        <option value="">No link</option>
                        @foreach($links as $link)
                            <option value="{{ $link->id }}" {{ old('link_id', $event->link_id) == $link->id ? 'selected' : '' }}>{{ $link->label }} ({{ $link->group }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Save changes</button>
                <a href="{{ route('admin.events.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-800">Cancel</a>
            </div>
        </form>
    </div>
@endsection
