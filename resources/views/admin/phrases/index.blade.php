@extends('admin.layout')

@section('content')
    @php use Illuminate\Support\Str; @endphp
    <div class="flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Phrases</h1>
            <p class="mt-1 text-sm text-slate-500">Site copy is managed centrally and cached for fast delivery.</p>
        </div>
        <a href="{{ route('admin.phrases.create') }}" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">New phrase</a>
    </div>

    <form method="GET" class="mt-6 grid gap-4 md:grid-cols-3">
        <div>
            <label class="block text-xs font-semibold uppercase text-slate-500">Search</label>
            <input type="search" name="search" value="{{ request('search') }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none" placeholder="Key or text">
        </div>
        <div>
            <label class="block text-xs font-semibold uppercase text-slate-500">Group</label>
            <select name="group" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none">
                <option value="">All groups</option>
                @foreach($groups as $group)
                    <option value="{{ $group }}" {{ request('group') === $group ? 'selected' : '' }}>{{ $group }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-end gap-3">
            <button type="submit" class="rounded-md border border-slate-300 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">Filter</button>
            <a href="{{ route('admin.phrases.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-800">Reset</a>
        </div>
    </form>

    <div class="mt-6 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50 text-left font-semibold text-slate-600">
            <tr>
                <th class="px-4 py-3">Key</th>
                <th class="px-4 py-3">Text</th>
                <th class="px-4 py-3">Context</th>
                <th class="px-4 py-3">Version</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
            @foreach($phrases as $phrase)
                <tr>
                    <td class="px-4 py-3 font-medium text-slate-800">{{ $phrase->key }}</td>
                    <td class="px-4 py-3 text-slate-600">{{ Str::limit($phrase->text, 80) }}</td>
                    <td class="px-4 py-3 text-slate-500">{{ $phrase->context ?: '—' }}</td>
                    <td class="px-4 py-3 text-slate-500">v{{ $phrase->version }}</td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.phrases.edit', $phrase) }}" class="text-sm font-medium text-slate-900 hover:text-slate-600">Edit</a>
                        <form action="{{ route('admin.phrases.destroy', $phrase) }}" method="POST" class="ml-3 inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-500" onclick="return confirm('Delete this phrase?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $phrases->links() }}</div>
@endsection
