<?php

namespace App\Services\Ssot;

use App\Jobs\OptimizeMedia;
use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaService
{
    public function __construct(private CacheService $cache)
    {
    }

    public function store(UploadedFile $file, string $purpose, array $attributes = []): Media
    {
        $media = Media::query()->firstOrNew(['purpose' => $purpose]);

        return $this->persist($media, array_merge($attributes, ['purpose' => $purpose]), $file);
    }

    public function delete(Media $media): void
    {
        Storage::disk($media->disk)->delete($media->path);
        $purpose = $media->purpose;
        $media->delete();

        $this->cache->forgetMedia($purpose);
    }

    public function update(Media $media, array $attributes, ?UploadedFile $file = null): Media
    {
        return $this->persist($media, $attributes, $file);
    }

    private function generateFilename(UploadedFile $file): string
    {
        $extension = $file->getClientOriginalExtension() ?: $file->extension() ?: 'jpg';
        return Str::uuid() . '.' . $extension;
    }

    private function persist(Media $media, array $attributes, ?UploadedFile $file = null): Media
    {
        $originalPurpose = $media->purpose;
        $purpose = $attributes['purpose'] ?? $originalPurpose;

        $shouldOptimize = false;

        if ($file) {
            $disk = 'public';
            $filename = $this->generateFilename($file);
            $path = $file->storeAs('media', $filename, ['disk' => $disk]);

            $info = @getimagesize($file->getRealPath());
            $hash = sha1_file($file->getRealPath());

            if ($media->exists && $media->path) {
                Storage::disk($media->disk)->delete($media->path);
            }

            $media->fill([
                'disk' => $disk,
                'path' => $path,
                'mime_type' => $file->getMimeType(),
                'width' => $info[0] ?? null,
                'height' => $info[1] ?? null,
                'hash' => $hash,
                'version' => $media->exists ? $media->version + 1 : 1,
            ]);
            $shouldOptimize = true;
        }

        $media->fill($attributes);
        $media->purpose = $purpose;
        $media->save();

        $this->cache->forgetMedia($purpose);

        if ($originalPurpose && $originalPurpose !== $purpose) {
            $this->cache->forgetMedia($originalPurpose);
        }

        if ($shouldOptimize) {
            OptimizeMedia::dispatch($media->id);
        }

        return $media;
    }
}
