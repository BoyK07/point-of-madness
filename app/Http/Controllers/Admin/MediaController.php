<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMediaRequest;
use App\Http\Requests\Admin\UpdateMediaRequest;
use App\Jobs\OptimizeImage;
use App\Models\Media;
use App\Services\SSOT\MediaService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MediaController extends Controller
{
    public function index(MediaService $mediaService): View
    {
        $media = $mediaService->all();

        return view('admin.media.index', compact('media'));
    }

    public function create(): View
    {
        return view('admin.media.create');
    }

    public function store(StoreMediaRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $file = $request->file('file');
        $disk = $data['disk'] ?? 'public';
        $purpose = $data['purpose'];
        $directory = 'ssot/'.$purpose;
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs($directory, $filename, $disk);

        $media = Media::updateOrCreate(
            ['purpose' => $purpose],
            [
                'disk' => $disk,
                'path' => $path,
                'alt' => $data['alt'] ?? null,
                'focal_x' => $data['focal_x'] ?? null,
                'focal_y' => $data['focal_y'] ?? null,
                'mime' => $file->getMimeType(),
                'hash' => null,
                'width' => null,
                'height' => null,
            ]
        );

        OptimizeImage::dispatch($media);

        return redirect()->route('admin.media.index')->with('status', 'Media saved successfully.');
    }

    public function edit(Media $media): View
    {
        return view('admin.media.edit', compact('media'));
    }

    public function update(UpdateMediaRequest $request, Media $media): RedirectResponse
    {
        $data = $request->validated();
        $previousDisk = $media->disk;
        $previousPath = $media->path;
        $originalPurpose = $media->purpose;
        $disk = $request->hasFile('file') ? ($data['disk'] ?? $media->disk) : $media->disk;

        $media->fill([
            'purpose' => $data['purpose'],
            'disk' => $disk,
            'alt' => $data['alt'] ?? null,
            'focal_x' => $data['focal_x'] ?? null,
            'focal_y' => $data['focal_y'] ?? null,
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $directory = 'ssot/'.$media->purpose;
            $filename = Str::uuid().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs($directory, $filename, $disk);
            $media->path = $path;
            $media->mime = $file->getMimeType();
            $media->width = null;
            $media->height = null;
            $media->hash = null;
        }

        $media->save();

        if ($request->hasFile('file') && $previousPath && Storage::disk($previousDisk)->exists($previousPath)) {
            Storage::disk($previousDisk)->delete($previousPath);
        }

        if (!$request->hasFile('file') && $previousPath && $originalPurpose !== $media->purpose) {
            $newDirectory = 'ssot/'.$media->purpose;
            $newPath = $newDirectory.'/'.basename($previousPath);

            if ($newPath !== $previousPath && Storage::disk($previousDisk)->exists($previousPath)) {
                Storage::disk($previousDisk)->makeDirectory($newDirectory);

                if (Storage::disk($previousDisk)->move($previousPath, $newPath)) {
                    $media->path = $newPath;
                    $media->save();
                }
            }
        }

        OptimizeImage::dispatch($media);

        return redirect()->route('admin.media.index')->with('status', 'Media updated successfully.');
    }

    public function destroy(Media $media): RedirectResponse
    {
        $disk = $media->disk;
        $path = $media->path;
        $media->delete();

        if ($path && Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);
        }

        return redirect()->route('admin.media.index')->with('status', 'Media deleted successfully.');
    }
}
