<?php

namespace App\Observers;

use App\Models\Phrase;
use App\Services\Ssot\CacheService;

class PhraseObserver
{
    public function __construct(private CacheService $cache)
    {
    }

    public function saved(Phrase $phrase): void
    {
        $this->cache->forgetPhrases();
    }

    public function deleted(Phrase $phrase): void
    {
        $this->cache->forgetPhrases();
    }
}
