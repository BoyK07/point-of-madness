<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Track extends Model
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
        'playcount',
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
            'playcount' => 'integer',
        ];
    }

    /**
     * Get the artist that owns the track.
     */
    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }
}


