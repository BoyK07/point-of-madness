<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLinkRequest;
use App\Http\Requests\Admin\UpdateLinkRequest;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('q', ''));

        $query = Link::query()
            ->when($search !== '', function ($q) use ($search) {
                $q->where(function ($w) use ($search) {
                    $w->where('label', 'like', "%{$search}%")
                      ->orWhere('url', 'like', "%{$search}%");
                });
            })
            ->orderBy('group')
            ->orderBy('order');

        return view('admin.links.index', [
            'links' => $query->paginate(20)->withQueryString(),
            'search' => $search,
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
