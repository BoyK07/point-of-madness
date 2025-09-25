@if(session('status'))
    <div class="rounded border border-emerald-600 bg-emerald-900/40 text-emerald-200 px-4 py-3">
        {{ session('status') }}
    </div>
@endif
@if(session('error'))
    <div class="rounded border border-red-600 bg-red-900/40 text-red-200 px-4 py-3">
        {{ session('error') }}
    </div>
@endif
@if($errors->any())
    <div class="rounded border border-amber-600 bg-amber-900/40 text-amber-200 px-4 py-3 space-y-1">
        <p class="font-semibold">Er zijn problemen gevonden:</p>
        <ul class="list-disc list-inside text-sm">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
