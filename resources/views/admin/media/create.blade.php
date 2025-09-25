<x-admin-layout>
    <h2 class="text-2xl font-semibold mb-4">Nieuwe media uploaden</h2>
    <form method="POST" action="{{ route('admin.media.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @php($media = new \App\Models\Media())
        @include('admin.media._form')
    </form>
</x-admin-layout>
