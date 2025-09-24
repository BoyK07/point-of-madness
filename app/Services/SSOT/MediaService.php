<?php

namespace App\Services\SSOT;

use App\Models\Media;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class MediaService
{
    public const CACHE_PREFIX = 'media:by_purpose:';
    public const CACHE_ALL = 'media:all';

    public function all(): Collection
    {
        return Cache::remember(self::CACHE_ALL, now()->addHour(), fn () => Media::query()->orderBy('purpose')->get());
    }

    public function findByPurpose(string $purpose): ?Media
    {
        return Cache::remember($this->cacheKey($purpose), now()->addHour(), fn () => Media::query()->where('purpose', $purpose)->first());
    }

    public function url(string $purpose, ?string $default = null): ?string
    {
        return $this->findByPurpose($purpose)?->versioned_url ?? $default;
    }

    /**
     * @param  string|string[]|null  $purpose
     */
    public function flush(string|array|null $purpose = null): void
    {
        if ($purpose !== null) {
            foreach (array_filter(array_unique((array) $purpose), fn ($value) => $value !== null && $value !== '') as $value) {
                Cache::forget($this->cacheKey($value));
            }

            Cache::forget(self::CACHE_ALL);

            return;
        }

        Cache::forget(self::CACHE_ALL);
    }

    private function cacheKey(string $purpose): string
    {
        return self::CACHE_PREFIX.$purpose;
    }
}
