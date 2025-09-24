<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'disk',
        'path',
        'purpose',
        'alt',
        'mime',
        'width',
        'height',
        'focal_x',
        'focal_y',
        'hash',
        'version',
    ];

    protected $casts = [
        'width' => 'integer',
        'height' => 'integer',
        'focal_x' => 'float',
        'focal_y' => 'float',
        'version' => 'integer',
    ];

    protected $appends = [
        'url',
        'versioned_url',
    ];

    public function getUrlAttribute(): string
    {
        return Storage::disk($this->disk)->url($this->path);
    }

    public function getVersionedUrlAttribute(): string
    {
        $url = $this->url;
        $version = $this->version ?? 1;

        return $url.(str_contains($url, '?') ? '&' : '?').'v='.$version;
    }
}
