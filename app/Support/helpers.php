<?php

use App\Services\Ssot\SsotService;
use Illuminate\Support\Facades\App;

if (! function_exists('phrase')) {
    function phrase(string $key, ?string $default = null): string
    {
        /** @var SsotService $ssot */
        $ssot = App::make(SsotService::class);

        return $ssot->phrase($key, $default);
    }
}

if (! function_exists('ssot_image_url')) {
    function ssot_image_url(string $purpose, ?string $default = null): ?string
    {
        /** @var SsotService $ssot */
        $ssot = App::make(SsotService::class);

        return $ssot->imageUrl($purpose, $default);
    }
}

if (! function_exists('ssot_links')) {
    function ssot_links(?string $groupOrSlug = null)
    {
        /** @var SsotService $ssot */
        $ssot = App::make(SsotService::class);

        return $ssot->links($groupOrSlug);
    }
}

if (! function_exists('ssot_events_upcoming')) {
    function ssot_events_upcoming()
    {
        /** @var SsotService $ssot */
        $ssot = App::make(SsotService::class);

        return $ssot->upcomingEvents();
    }
}
