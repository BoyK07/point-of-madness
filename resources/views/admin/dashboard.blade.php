@extends('admin.layout')

@section('content')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Admin dashboard</h1>
            <p class="mt-1 text-sm text-slate-500">Quick overview of the site single source of truth.</p>
        </div>
        <a href="{{ route('admin.phrases.create') }}" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Add phrase</a>
    </div>

    <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Users</p>
            <p class="mt-3 text-3xl font-bold">{{ $userCount }}</p>
        </div>
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Media assets</p>
            <p class="mt-3 text-3xl font-bold">{{ $mediaCount }}</p>
        </div>
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Links managed</p>
            <p class="mt-3 text-3xl font-bold">{{ $linkCount }}</p>
        </div>
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Phrases</p>
            <p class="mt-3 text-3xl font-bold">{{ $phraseCount }}</p>
        </div>
    </div>

    <div class="mt-10 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="text-lg font-semibold text-slate-800">Upcoming events</h2>
        <p class="mt-1 text-sm text-slate-500">{{ $upcomingEvents }} event(s) scheduled.</p>
        <a href="{{ route('admin.events.index') }}" class="mt-4 inline-flex items-center text-sm font-medium text-slate-900 hover:text-slate-600">Manage events →</a>
    </div>
@endsection
