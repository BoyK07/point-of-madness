@extends('admin.layout')

@section('content')
    <div class="flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Events</h1>
            <p class="mt-1 text-sm text-slate-500">Upcoming events feed the public schedule component automatically.</p>
        </div>
        <a href="{{ route('admin.events.create') }}" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">New event</a>
    </div>

    <form method="GET" class="mt-6 flex items-center gap-4 text-sm">
        <label class="flex items-center gap-2">
            <input type="checkbox" name="upcoming" value="1" {{ request('upcoming', '1') ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-slate-900 focus:ring-slate-500">
            <span class="text-slate-600">Only show upcoming</span>
        </label>
        <button type="submit" class="rounded-md border border-slate-300 px-3 py-2 font-medium text-slate-700 hover:bg-slate-100">Apply</button>
        <a href="{{ route('admin.events.index') }}" class="text-slate-500 hover:text-slate-800">Reset</a>
    </form>

    <div class="mt-6 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50 text-left font-semibold text-slate-600">
            <tr>
                <th class="px-4 py-3">Title</th>
                <th class="px-4 py-3">Dates</th>
                <th class="px-4 py-3">Location</th>
                <th class="px-4 py-3">Media</th>
                <th class="px-4 py-3">CTA</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
            @foreach($events as $event)
                <tr>
                    <td class="px-4 py-3 font-medium text-slate-800">{{ $event->title }}</td>
                    <td class="px-4 py-3 text-slate-600">
                        {{ $event->starts_at?->format('d M Y H:i') }}
                        @if($event->ends_at)
                            <br><span class="text-xs text-slate-500">→ {{ $event->ends_at->format('d M Y H:i') }}</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-slate-500">{{ $event->location ?: '—' }}</td>
                    <td class="px-4 py-3 text-slate-500">{{ $event->media?->purpose ?: '—' }}</td>
                    <td class="px-4 py-3 text-slate-500">{{ $event->link?->label ?: '—' }}</td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.events.edit', $event) }}" class="text-sm font-medium text-slate-900 hover:text-slate-600">Edit</a>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="ml-3 inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-500" onclick="return confirm('Delete this event?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $events->links() }}</div>
@endsection
