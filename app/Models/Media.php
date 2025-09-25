<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'focal_point',
        'mime_type',
        'width',
        'height',
        'hash',
        'version',
    ];

    protected $casts = [
        'focal_point' => 'array',
        'version' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function url(): Attribute
    {
        return Attribute::get(function () {
            $url = Storage::disk($this->disk)->url($this->path);
            return $url . '?v=' . $this->version;
        });
    }
}
