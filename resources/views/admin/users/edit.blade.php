@extends('admin.layout')

@section('content')
    <div class="max-w-2xl">
        <h1 class="text-2xl font-semibold text-slate-900">Edit user</h1>
        <p class="mt-1 text-sm text-slate-500">Update profile information or reset the password.</p>

        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="mt-6 space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-slate-700" for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none" required>
            </div>
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="password">New password</label>
                    <input type="password" name="password" id="password" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none" placeholder="Leave blank to keep current">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700" for="password_confirmation">Confirm password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none">
                </div>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Save changes</button>
                <a href="{{ route('admin.users.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-800">Cancel</a>
            </div>
        </form>
    </div>
@endsection
