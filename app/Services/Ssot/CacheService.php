<?php

namespace App\Services\Ssot;

use App\Models\Link;
use App\Models\Media;
use Illuminate\Cache\Repository;
use Illuminate\Support\Facades\Cache;

class CacheService
{
    public function __construct(private ?Repository $cache = null)
    {
        $this->cache = $cache ?? Cache::store();
    }

    public function forgetLinks(?string $group = null, ?string $slug = null): void
    {
        $this->cache->forget('nav:links');
        $this->cache->forget('footer:links');

        if ($group) {
            $this->cache->forget("links:group:{$group}");
        }

        if ($slug) {
            $this->cache->forget("links:slug:{$slug}");
        }
    }

    public function forgetMedia(?string $purpose = null): void
    {
        if ($purpose) {
            $this->cache->forget("media:by_purpose:{$purpose}");
        }
    }

    public function forgetEvents(): void
    {
        $this->cache->forget('events:upcoming');
    }

    public function forgetPhrases(): void
    {
        $this->cache->forget('site:phrases');
    }

    public function rememberMedia(string $purpose): ?Media
    {
        return $this->cache->remember("media:by_purpose:{$purpose}", 3600, fn () => Media::query()->where('purpose', $purpose)->first());
    }

    public function rememberLinks(?string $group = null)
    {
        $key = $group ? "links:group:{$group}" : 'links:all';

        return $this->cache->remember($key, 3600, function () use ($group) {
            $query = Link::query()->orderBy('order')->orderBy('label');
            if (! is_null($group)) {
                $query->where('group', $group);
            }

            return $query->where('visible', true)->get();
        });
    }

    public function rememberLinkBySlug(string $slug): ?Link
    {
        return $this->cache->remember("links:slug:{$slug}", 3600, function () use ($slug) {
            return Link::query()->where('slug', $slug)->where('visible', true)->first();
        });
    }
}
