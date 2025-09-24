<?php

namespace App\Services\SSOT;

use App\Models\Phrase;
use Illuminate\Support\Facades\Cache;

class PhraseService
{
    public const CACHE_KEY = 'site:phrases';

    public function all(): array
    {
        return Cache::remember(self::CACHE_KEY, now()->addDay(), function () {
            return Phrase::query()->orderBy('key')->get()->mapWithKeys(fn (Phrase $phrase) => [
                $phrase->key => $phrase->text,
            ])->toArray();
        });
    }

    public function get(string $key, ?string $default = null): ?string
    {
        $phrases = $this->all();

        if (array_key_exists($key, $phrases)) {
            return $phrases[$key];
        }

        return $default;
    }

    public function flush(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}
