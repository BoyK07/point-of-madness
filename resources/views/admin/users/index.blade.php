@extends('admin.layout')

@section('content')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Users</h1>
            <p class="mt-1 text-sm text-slate-500">Any authenticated account can access the admin panel.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">New user</a>
    </div>

    <div class="mt-8 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50 text-left font-semibold text-slate-600">
            <tr>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Created</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
            @foreach($users as $user)
                <tr>
                    <td class="px-4 py-3 font-medium text-slate-800">{{ $user->name }}</td>
                    <td class="px-4 py-3 text-slate-600">{{ $user->email }}</td>
                    <td class="px-4 py-3 text-slate-500">{{ $user->created_at?->format('d M Y') }}</td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.users.edit', $user) }}" class="text-sm font-medium text-slate-900 hover:text-slate-600">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="ml-3 inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-500" onclick="return confirm('Delete this user?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $users->links() }}</div>
@endsection
