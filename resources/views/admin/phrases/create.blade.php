<x-admin-layout>
    <h2 class="text-2xl font-semibold mb-4">Nieuwe tekst</h2>
    <form method="POST" action="{{ route('admin.phrases.store') }}" class="space-y-6">
        @csrf
        @php($phrase = new \App\Models\Phrase())
        @include('admin.phrases._form')
    </form>
</x-admin-layout>
