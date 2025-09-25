<x-admin-layout>
    <h2 class="text-2xl font-semibold mb-4">Nieuw event</h2>
    <form method="POST" action="{{ route('admin.events.store') }}" class="space-y-6">
        @csrf
        @php($event = new \App\Models\Event())
        @include('admin.events._form')
    </form>
</x-admin-layout>
