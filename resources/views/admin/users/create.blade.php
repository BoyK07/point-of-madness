<x-admin-layout>
    <h2 class="text-2xl font-semibold mb-4">Nieuwe gebruiker</h2>
    <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6">
        @csrf
        @php($user = new \App\Models\User())
        @include('admin.users._form')
    </form>
</x-admin-layout>
