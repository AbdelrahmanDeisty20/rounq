<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteImage extends Model
{
    protected $fillable = [
        'section',
        'title',
        'location_hint',
        'path',
        'url',
        'is_active',
    ];

    /**
     * Accessor for the URL attribute.
     * If a path exists, generate a full URL from it.
     */
    public function getUrlAttribute($value)
    {
        if ($this->path) {
            return asset('storage/' . $this->path);
        }

        return $value; // Fallback to the stored URL if no path exists
    }
}
