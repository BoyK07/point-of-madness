<?php

namespace App\Services\SSOT;

use App\Models\Link;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class LinkService
{
    public const CACHE_PREFIX = 'links:group:';

    public function group(string $group): Collection
    {
        return Cache::remember($this->cacheKey($group), now()->addHour(), function () use ($group) {
            return Link::query()
                ->where('group', $group)
                ->where('visible', true)
                ->orderBy('order')
                ->get();
        });
    }

    /**
     * @param  string|string[]|null  $group
     */
    public function flush(string|array|null $group = null): void
    {
        if ($group !== null) {
            foreach (array_filter(array_unique((array) $group), fn ($value) => $value !== null && $value !== '') as $value) {
                Cache::forget($this->cacheKey($value));
            }

            return;
        }

        Link::query()
            ->select('group')
            ->distinct()
            ->pluck('group')
            ->each(fn (string $value) => Cache::forget($this->cacheKey($value)));
    }

    private function cacheKey(string $group): string
    {
        return self::CACHE_PREFIX.$group;
    }
}
