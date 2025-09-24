@extends('admin.layout')

@section('content')
    <div class="flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Links</h1>
            <p class="mt-1 text-sm text-slate-500">Navigation, footer, and CTA links are managed here.</p>
        </div>
        <a href="{{ route('admin.links.create') }}" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">New link</a>
    </div>

    <form method="GET" class="mt-6 flex flex-wrap items-end gap-4">
        <div>
            <label class="block text-xs font-semibold uppercase text-slate-500">Group</label>
            <select name="group" class="mt-1 rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none">
                <option value="">All groups</option>
                @foreach($groups as $group)
                    <option value="{{ $group }}" {{ request('group') === $group ? 'selected' : '' }}>{{ $group }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="rounded-md border border-slate-300 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">Filter</button>
        <a href="{{ route('admin.links.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-800">Reset</a>
    </form>

    <div class="mt-6 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50 text-left font-semibold text-slate-600">
            <tr>
                <th class="px-4 py-3">Label</th>
                <th class="px-4 py-3">Group</th>
                <th class="px-4 py-3">URL</th>
                <th class="px-4 py-3">Order</th>
                <th class="px-4 py-3">Visible</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
            @foreach($links as $link)
                <tr>
                    <td class="px-4 py-3 font-medium text-slate-800">{{ $link->label }}</td>
                    <td class="px-4 py-3 text-slate-600">{{ $link->group }}</td>
                    <td class="px-4 py-3 text-slate-500">
                        <a href="{{ $link->url }}" target="_blank" class="text-slate-500 hover:text-slate-800">{{ \Illuminate\Support\Str::limit($link->url, 50) }}</a>
                    </td>
                    <td class="px-4 py-3 text-slate-500">{{ $link->order }}</td>
                    <td class="px-4 py-3">
                        <span class="rounded-full px-2 py-1 text-xs font-semibold {{ $link->visible ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-200 text-slate-700' }}">{{ $link->visible ? 'Visible' : 'Hidden' }}</span>
                    </td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.links.edit', $link) }}" class="text-sm font-medium text-slate-900 hover:text-slate-600">Edit</a>
                        <form action="{{ route('admin.links.destroy', $link) }}" method="POST" class="ml-3 inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-500" onclick="return confirm('Delete this link?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $links->links() }}</div>
@endsection
