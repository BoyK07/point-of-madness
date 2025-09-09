<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'spotify_id',
        'image',
        'monthly_listeners',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'monthly_listeners' => 'integer',
        ];
    }

    /**
     * Get the tracks for the artist.
     */
    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }
}


