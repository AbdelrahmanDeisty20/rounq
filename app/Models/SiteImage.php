<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteImage extends Model
{
    protected $fillable = [
        'section',
        'title',
        'location_hint',
        'pathwwwww',
        'url',
        'is_active',
    ];
}
