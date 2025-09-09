<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'artist_id',
        'name',
        'spotify_id',
        'image',
        'album_type',
        'total_tracks',
        'release_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'artist_id' => 'integer',
            'total_tracks' => 'integer',
            'release_date' => 'date',
        ];
    }

    /**
     * Get the artist that owns the album.
     */
    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    /**
     * Get the tracks that belong to the album.
     */
    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }
}


