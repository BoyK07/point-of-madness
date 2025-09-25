<?php

namespace App\Observers;

use App\Models\Event;
use App\Services\Ssot\CacheService;

class EventObserver
{
    public function __construct(private CacheService $cache)
    {
    }

    public function saved(Event $event): void
    {
        $this->cache->forgetEvents();
    }

    public function deleted(Event $event): void
    {
        $this->cache->forgetEvents();
    }
}
