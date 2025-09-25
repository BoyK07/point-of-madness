<x-admin-layout>
    <h2 class="text-2xl font-semibold mb-4">Link bewerken</h2>
    <form method="POST" action="{{ route('admin.links.update', $link) }}" class="space-y-6">
        @csrf
        @method('PUT')
        @include('admin.links._form', ['link' => $link])
    </form>
</x-admin-layout>
