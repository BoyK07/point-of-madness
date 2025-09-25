<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMediaRequest;
use App\Http\Requests\Admin\UpdateMediaRequest;
use App\Models\Media;
use App\Services\Ssot\MediaService;

class MediaController extends Controller
{
    public function __construct(private MediaService $mediaService)
    {
    }

    public function index()
    {
        return view('admin.media.index', [
            'media' => Media::orderBy('purpose')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(StoreMediaRequest $request)
    {
        $this->mediaService->store(
            $request->file('file'),
            $request->input('purpose'),
            $request->safe()->except('file')->toArray()
        );

        return redirect()->route('admin.media.index')->with('status', 'Media opgeslagen.');
    }

    public function edit(Media $medium)
    {
        return view('admin.media.edit', ['media' => $medium]);
    }

    public function update(UpdateMediaRequest $request, Media $medium)
    {
        $this->mediaService->update(
            $medium,
            $request->safe()->except('file')->toArray(),
            $request->file('file')
        );

        return redirect()->route('admin.media.index')->with('status', 'Media bijgewerkt.');
    }

    public function destroy(Media $medium)
    {
        $this->mediaService->delete($medium);

        return redirect()->route('admin.media.index')->with('status', 'Media verwijderd.');
    }
}
