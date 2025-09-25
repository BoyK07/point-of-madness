<?php

namespace App\Observers;

use App\Models\Link;
use App\Services\Ssot\CacheService;

class LinkObserver
{
    public function __construct(private CacheService $cache)
    {
    }

    public function saved(Link $link): void
    {
        $this->cache->forgetLinks($link->group, $link->slug);
    }

    public function deleted(Link $link): void
    {
        $this->cache->forgetLinks($link->group, $link->slug);
    }
}
