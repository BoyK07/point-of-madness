<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class Linktree extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'url',
        'category',
    ];

    /**
     * Retrieve all links keyed by slug from cache.
     */
    public static function getCachedLinks(): Collection
    {
        if (! Schema::hasTable((new static())->getTable())) {
            return collect();
        }

        return Cache::rememberForever('linktree.links', function () {
            return static::query()->orderBy('slug')->get()->keyBy('slug');
        });
    }

    /**
     * Resolve the URL for a given link slug.
     */
    public static function url(string $slug, ?string $default = null): ?string
    {
        $link = static::getCachedLinks()->get($slug);

        return $link?->url ?? $default;
    }

    /**
     * Flush cached link data when the model changes.
     */
    protected static function booted(): void
    {
        $flush = fn () => Cache::forget('linktree.links');

        static::saved($flush);
        static::deleted($flush);
    }
}
