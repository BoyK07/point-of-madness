<?php

namespace App\Jobs;

use App\Models\Media;
use App\Services\SSOT\MediaService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class OptimizeImage implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(public Media $media)
    {
    }

    public function handle(ImageManager $imageManager, MediaService $mediaService): void
    {
        $disk = $this->media->disk;
        $path = $this->media->path;
        $absolute = Storage::disk($disk)->path($path);

        if (!is_file($absolute)) {
            return;
        }

        ImageOptimizer::optimize($absolute);

        $image = $imageManager->read($absolute);
        $this->media->forceFill([
            'mime' => $image->mime() ?? mime_content_type($absolute),
            'width' => $image->width(),
            'height' => $image->height(),
            'hash' => hash_file('sha256', $absolute),
            'version' => ($this->media->version ?? 0) + 1,
        ])->save();

        $mediaService->flush($this->media->purpose);
    }
}
