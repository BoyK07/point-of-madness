<x-admin-layout>
    <h2 class="text-2xl font-semibold mb-4">Media bewerken</h2>
    <form method="POST" action="{{ route('admin.media.update', $media) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        @include('admin.media._form', ['media' => $media])
    </form>
</x-admin-layout>
