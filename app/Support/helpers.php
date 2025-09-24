<?php

use App\Services\SSOT\EventService;
use App\Services\SSOT\LinkService;
use App\Services\SSOT\MediaService;
use App\Services\SSOT\PhraseService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

if (!function_exists('phrase')) {
    function phrase(string $key, ?string $default = null): string
    {
        /** @var PhraseService $service */
        $service = app(PhraseService::class);
        $value = $service->get($key);

        if ($value === null) {
            $fallback = $default ?? $key;
            Log::warning('Missing phrase from SSOT', [
                'key' => $key,
                'default_used' => $default !== null,
            ]);

            return $fallback;
        }

        return $value;
    }
}

if (!function_exists('ssot_image_url')) {
    function ssot_image_url(string $purpose, ?string $default = null): ?string
    {
        /** @var MediaService $service */
        $service = app(MediaService::class);

        return $service->url($purpose, $default);
    }
}

if (!function_exists('ssot_media')) {
    function ssot_media(string $purpose): ?\App\Models\Media
    {
        /** @var MediaService $service */
        $service = app(MediaService::class);

        return $service->findByPurpose($purpose);
    }
}

if (!function_exists('ssot_links')) {
    /**
     * @return Collection<int, \App\Models\Link>
     */
    function ssot_links(string $group): Collection
    {
        /** @var LinkService $service */
        $service = app(LinkService::class);

        return $service->group($group);
    }
}

if (!function_exists('ssot_events_upcoming')) {
    /**
     * @return Collection<int, \App\Models\Event>
     */
    function ssot_events_upcoming(): Collection
    {
        /** @var EventService $service */
        $service = app(EventService::class);

        return $service->upcoming();
    }
}
