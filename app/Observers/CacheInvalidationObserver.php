<?php

namespace App\Observers;

use App\Models\Event;
use App\Models\Link;
use App\Models\Media;
use App\Models\Phrase;
use App\Services\SSOT\EventService;
use App\Services\SSOT\LinkService;
use App\Services\SSOT\MediaService;
use App\Services\SSOT\PhraseService;

class CacheInvalidationObserver
{
    public function saved($model): void
    {
        $this->flush($model);
    }

    public function deleted($model): void
    {
        $this->flush($model);
    }

    protected function flush($model): void
    {
        if ($model instanceof Media) {
            $purposes = array_filter(array_unique([
                $model->purpose,
                $model->getOriginal('purpose'),
            ]), fn ($value) => $value !== null && $value !== '');

            app(MediaService::class)->flush($purposes ?: null);
        }

        if ($model instanceof Link) {
            $groups = array_filter(array_unique([
                $model->group,
                $model->getOriginal('group'),
            ]), fn ($value) => $value !== null && $value !== '');

            app(LinkService::class)->flush($groups ?: null);
        }

        if ($model instanceof Event) {
            app(EventService::class)->flush();
        }

        if ($model instanceof Phrase) {
            app(PhraseService::class)->flush();
        }
    }
}
