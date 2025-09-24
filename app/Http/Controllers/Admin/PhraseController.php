<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePhraseRequest;
use App\Http\Requests\Admin\UpdatePhraseRequest;
use App\Models\Phrase;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PhraseController extends Controller
{
    public function index(Request $request): View
    {
        $query = Phrase::query()->orderBy('key');

        if ($request->filled('search')) {
            $search = $request->string('search');
            $query->where(function ($q) use ($search) {
                $q->where('key', 'like', "%{$search}%")
                    ->orWhere('text', 'like', "%{$search}%");
            });
        }

        if ($request->filled('group')) {
            $group = $request->string('group');
            $query->where('key', 'like', $group.'%');
        }

        $phrases = $query->paginate(25)->withQueryString();
        $groups = Phrase::query()->pluck('key')->map(fn ($key) => Str::before($key, '.'))
            ->filter()
            ->unique()
            ->sort()
            ->values();

        return view('admin.phrases.index', compact('phrases', 'groups'));
    }

    public function create(): View
    {
        return view('admin.phrases.create');
    }

    public function store(StorePhraseRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['version'] = 1;

        Phrase::create($data);

        return redirect()->route('admin.phrases.index')->with('status', 'Phrase created successfully.');
    }

    public function edit(Phrase $phrase): View
    {
        return view('admin.phrases.edit', compact('phrase'));
    }

    public function update(UpdatePhraseRequest $request, Phrase $phrase): RedirectResponse
    {
        $data = $request->validated();
        $data['version'] = $phrase->version + 1;

        $phrase->update($data);

        return redirect()->route('admin.phrases.index')->with('status', 'Phrase updated successfully.');
    }

    public function destroy(Phrase $phrase): RedirectResponse
    {
        $phrase->delete();

        return redirect()->route('admin.phrases.index')->with('status', 'Phrase deleted successfully.');
    }
}
