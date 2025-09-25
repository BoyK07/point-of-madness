<?php

namespace App\Services\Ssot;

use App\Models\Event;
use App\Models\Phrase;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SsotService
{
    public function __construct(private CacheService $cache)
    {
    }

    public function phrases(): Collection
    {
        return Cache::remember('site:phrases', 3600, fn () => Phrase::query()->get()->keyBy('key'));
    }

    public function phrase(string $key, ?string $default = null): string
    {
        $phrases = $this->phrases();

        return $phrases->get($key)?->text ?? $default ?? $key;
    }

    public function imageUrl(string $purpose, ?string $default = null): ?string
    {
        $media = $this->cache->rememberMedia($purpose);

        if (! $media) {
            return $default;
        }

        return Storage::disk($media->disk)->url($media->path) . '?v=' . $media->version;
    }

    public function links(?string $groupOrSlug = null): Collection
    {
        if (is_null($groupOrSlug)) {
            return $this->cache->rememberLinks();
        }

        $groupLinks = $this->cache->rememberLinks($groupOrSlug);

        if ($groupLinks instanceof Collection && $groupLinks->isNotEmpty()) {
            return $groupLinks;
        }

        $link = $this->cache->rememberLinkBySlug($groupOrSlug);

        if ($link) {
            return collect([$link]);
        }

        return collect();
    }

    public function upcomingEvents(): Collection
    {
        return Cache::remember('events:upcoming', 900, function () {
            return Event::query()
                ->with(['media', 'link'])
                ->where('starts_at', '>=', now()->startOfDay())
                ->orderBy('starts_at')
                ->get();
        });
    }
}
