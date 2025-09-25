<?php

namespace App\Observers;

use App\Models\Media;
use App\Services\Ssot\CacheService;

class MediaObserver
{
    public function __construct(private CacheService $cache)
    {
    }

    public function saved(Media $media): void
    {
        $this->cache->forgetMedia($media->purpose);
    }

    public function deleted(Media $media): void
    {
        $this->cache->forgetMedia($media->purpose);
    }
}
