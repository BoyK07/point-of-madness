<x-admin-layout>
    <h2 class="text-2xl font-semibold mb-4">Nieuwe link</h2>
    <form method="POST" action="{{ route('admin.links.store') }}" class="space-y-6">
        @csrf
        @php($link = new \App\Models\Link())
        @include('admin.links._form')
    </form>
</x-admin-layout>
