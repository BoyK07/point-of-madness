<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLinkRequest;
use App\Http\Requests\Admin\UpdateLinkRequest;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LinkController extends Controller
{
    public function index(Request $request): View
    {
        $query = Link::query()->orderBy('group')->orderBy('order');

        if ($request->filled('group')) {
            $query->where('group', $request->string('group'));
        }

        $links = $query->paginate(20)->withQueryString();
        $groups = Link::query()->select('group')->distinct()->pluck('group');

        return view('admin.links.index', compact('links', 'groups'));
    }

    public function create(): View
    {
        $groups = Link::query()->select('group')->distinct()->pluck('group');

        return view('admin.links.create', compact('groups'));
    }

    public function store(StoreLinkRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['visible'] = $request->boolean('visible', true);

        Link::create($data);

        return redirect()->route('admin.links.index')->with('status', 'Link created successfully.');
    }

    public function edit(Link $link): View
    {
        $groups = Link::query()->select('group')->distinct()->pluck('group');

        return view('admin.links.edit', compact('link', 'groups'));
    }

    public function update(UpdateLinkRequest $request, Link $link): RedirectResponse
    {
        $data = $request->validated();
        $data['visible'] = $request->boolean('visible', true);

        $link->update($data);

        return redirect()->route('admin.links.index')->with('status', 'Link updated successfully.');
    }

    public function destroy(Link $link): RedirectResponse
    {
        $link->delete();

        return redirect()->route('admin.links.index')->with('status', 'Link deleted successfully.');
    }
}
