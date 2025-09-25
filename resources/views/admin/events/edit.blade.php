<x-admin-layout>
    <h2 class="text-2xl font-semibold mb-4">Event bewerken</h2>
    <form method="POST" action="{{ route('admin.events.update', $event) }}" class="space-y-6">
        @csrf
        @method('PUT')
        @include('admin.events._form', ['event' => $event])
    </form>
</x-admin-layout>
