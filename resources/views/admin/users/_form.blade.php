<div class="grid gap-4 md:grid-cols-2">
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Naam</span>
        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" required>
    </label>
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">E-mail</span>
        <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" required>
    </label>
</div>
<div class="grid gap-4 md:grid-cols-2">
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Wachtwoord @if(isset($user))<span class="text-slate-400 text-xs">(laat leeg om ongewijzigd te laten)</span>@endif</span>
        <input type="password" name="password" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" @if(!isset($user)) required @endif>
    </label>
    <label class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Wachtwoord bevestiging</span>
        <input type="password" name="password_confirmation" class="rounded bg-slate-950 border border-slate-800 px-3 py-2 text-white" @if(!isset($user)) required @endif>
    </label>
</div>
<div class="flex flex-wrap justify-end gap-3">
    <a href="{{ route('admin.users.index') }}" class="px-4 py-2 rounded border border-slate-700 text-slate-300 hover:border-slate-500 w-full sm:w-auto text-center">Annuleren</a>
    <button type="submit" class="px-4 py-2 rounded bg-amber-500 text-slate-900 font-semibold hover:bg-amber-400 w-full sm:w-auto">Opslaan</button>
</div>
