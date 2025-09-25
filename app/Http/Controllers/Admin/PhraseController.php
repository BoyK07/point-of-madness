<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePhraseRequest;
use App\Http\Requests\Admin\UpdatePhraseRequest;
use App\Models\Phrase;

class PhraseController extends Controller
{
    public function index()
    {
        return view('admin.phrases.index', [
            'phrases' => Phrase::orderBy('key')->paginate(25),
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
