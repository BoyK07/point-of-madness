<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builders\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'starts_at',
        'ends_at',
        'location',
        'description',
        'media_id',
        'link_id',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('upcoming', function (Builder $builder): void {
            $builder->where(function (Builder $query): void {
                $now = Carbon::now();
                $query->whereNull('ends_at')->where('starts_at', '>=', $now)
                    ->orWhere('ends_at', '>=', $now);
            })->orderBy('starts_at');
        });
    }

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query;
    }

    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    public function link(): BelongsTo
    {
        return $this->belongsTo(Link::class);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->newQueryWithoutScopes()
            ->where($field ?? $this->getRouteKeyName(), $value)
            ->firstOrFail();
    }
}
