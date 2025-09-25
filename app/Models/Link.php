<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'label',
        'url',
        'target',
        'rel',
        'order',
        'visible',
        'group',
    ];

    protected $casts = [
        'visible' => 'boolean',
        'order' => 'integer',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
