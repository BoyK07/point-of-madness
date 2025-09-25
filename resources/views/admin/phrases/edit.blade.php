<x-admin-layout>
    <h2 class="text-2xl font-semibold mb-4">Tekst bewerken</h2>
    <form method="POST" action="{{ route('admin.phrases.update', $phrase) }}" class="space-y-6">
        @csrf
        @method('PUT')
        @include('admin.phrases._form', ['phrase' => $phrase])
    </form>
</x-admin-layout>
