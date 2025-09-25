<x-admin-layout>
    <h2 class="text-2xl font-semibold mb-4">Gebruiker bewerken</h2>
    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
        @csrf
        @method('PUT')
        @include('admin.users._form', ['user' => $user])
    </form>
</x-admin-layout>
