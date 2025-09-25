<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLinkRequest;
use App\Http\Requests\Admin\UpdateLinkRequest;
use App\Models\Link;

class LinkController extends Controller
{
    public function index()
    {
        return view('admin.links.index', [
            'links' => Link::orderBy('group')->orderBy('order')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.links.create');
    }

    public function store(StoreLinkRequest $request)
    {
        Link::create($request->validated());

        return redirect()->route('admin.links.index')->with('status', 'Link opgeslagen.');
    }

    public function edit(Link $link)
    {
        return view('admin.links.edit', compact('link'));
    }

    public function update(UpdateLinkRequest $request, Link $link)
    {
        $link->update($request->validated());

        return redirect()->route('admin.links.index')->with('status', 'Link bijgewerkt.');
    }

    public function destroy(Link $link)
    {
        $link->delete();

        return redirect()->route('admin.links.index')->with('status', 'Link verwijderd.');
    }
}
