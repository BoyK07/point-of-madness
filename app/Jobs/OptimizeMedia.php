<?php

namespace App\Jobs;

use App\Models\Media;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class OptimizeMedia implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private int $mediaId)
    {
    }

    public function handle(): void
    {
        $media = Media::query()->find($this->mediaId);

        if (! $media) {
            return;
        }

        $path = Storage::disk($media->disk)->path($media->path);

        if (! file_exists($path)) {
            return;
        }

        ImageOptimizer::optimize($path);
    }
}
