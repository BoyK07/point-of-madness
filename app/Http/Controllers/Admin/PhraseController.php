<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePhraseRequest;
use App\Http\Requests\Admin\UpdatePhraseRequest;
use App\Models\Phrase;
use Illuminate\Http\Request;

class PhraseController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('q', ''));

        $query = Phrase::query()
            ->when($search !== '', function ($q) use ($search) {
                $q->where(function ($w) use ($search) {
                    $w->where('text', 'like', "%{$search}%")
                      ->orWhere('key', 'like', "%{$search}%")
                      ->orWhere('context', 'like', "%{$search}%");
                });
            })
            ->orderBy('key');

        return view('admin.phrases.index', [
            'phrases' => $query->paginate(25)->withQueryString(),
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('admin.phrases.create');
    }

    public function store(StorePhraseRequest $request)
    {
        Phrase::create($request->validated());

        return redirect()->route('admin.phrases.index')->with('status', 'Tekst opgeslagen.');
    }

    public function edit(Phrase $phrase)
    {
        return view('admin.phrases.edit', compact('phrase'));
    }

    public function update(UpdatePhraseRequest $request, Phrase $phrase)
    {
        $data = $request->validated();
        $phrase->fill($data);
        $phrase->version = $phrase->version + 1;
        $phrase->save();

        return redirect()->route('admin.phrases.index')->with('status', 'Tekst bijgewerkt.');
    }

    public function destroy(Phrase $phrase)
    {
        $phrase->delete();

        return redirect()->route('admin.phrases.index')->with('status', 'Tekst verwijderd.');
    }
}
