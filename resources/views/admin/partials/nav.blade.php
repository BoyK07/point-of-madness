<aside class="hidden w-64 flex-shrink-0 border-r border-slate-200 bg-white md:flex md:flex-col">
    <div class="border-b border-slate-200 px-6 py-5">
        <h1 class="text-lg font-semibold text-slate-800">{{ config('app.name') }} Admin</h1>
        <p class="text-sm text-slate-500">Manage content from a single source of truth.</p>
    </div>
    <nav class="flex-1 space-y-1 px-3 py-4 text-sm">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 rounded-lg px-3 py-2 font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
            <span>Dashboard</span>
        </a>
        <a href="{{ route('admin.media.index') }}" class="flex items-center gap-2 rounded-lg px-3 py-2 font-medium {{ request()->routeIs('admin.media.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
            <span>Media</span>
        </a>
        <a href="{{ route('admin.links.index') }}" class="flex items-center gap-2 rounded-lg px-3 py-2 font-medium {{ request()->routeIs('admin.links.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
            <span>Links</span>
        </a>
        <a href="{{ route('admin.events.index') }}" class="flex items-center gap-2 rounded-lg px-3 py-2 font-medium {{ request()->routeIs('admin.events.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
            <span>Events</span>
        </a>
        <a href="{{ route('admin.phrases.index') }}" class="flex items-center gap-2 rounded-lg px-3 py-2 font-medium {{ request()->routeIs('admin.phrases.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
            <span>Phrases</span>
        </a>
        <a href="{{ route('admin.users.index') }}" class="flex items-center gap-2 rounded-lg px-3 py-2 font-medium {{ request()->routeIs('admin.users.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
            <span>Users</span>
        </a>
    </nav>
    <div class="border-t border-slate-200 px-6 py-4 text-sm text-slate-500">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="rounded-md border border-slate-300 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">Sign out</button>
        </form>
    </div>
</aside>
