<?php

namespace App\Services\SSOT;

use App\Models\Event;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class EventService
{
    public const CACHE_KEY = 'events:upcoming';

    public function upcoming(): Collection
    {
        return Cache::remember(self::CACHE_KEY, now()->addMinutes(30), function () {
            $now = now();

            return Event::withoutGlobalScope('upcoming')
                ->with(['media', 'link'])
                ->where(function ($query) use ($now) {
                    $query->whereNull('ends_at')->where('starts_at', '>=', $now)
                        ->orWhere('ends_at', '>=', $now);
                })
                ->orderBy('starts_at')
                ->get();
        });
    }

    public function flush(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}
