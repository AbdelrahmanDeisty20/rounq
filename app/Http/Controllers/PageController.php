<?php

namespace App\Http\Controllers;

use App\Models\SiteImage;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function show($slug = 'index')
    {
        // Remove .html if present in the slug
        $slug = str_replace('.html', '', $slug);
        
        if ($slug === '') {
            $slug = 'index';
        }

        if (!View::exists('pages.' . $slug)) {
            abort(404);
        }

        $allImages = SiteImage::all();
        $images = [
            'hero' => $allImages->where('section', 'hero'),
            'services' => $allImages->filter(fn($img) => str_starts_with($img->section, 'service-'))->sortBy('section'),
            'steps' => $allImages->filter(fn($img) => str_starts_with($img->section, 'step-'))->sortBy('section'),
            'gallery' => $allImages->filter(fn($img) => str_starts_with($img->section, 'gallery-'))->sortBy('section'),
        ];
        
        $settings = SiteSetting::all()->pluck('value', 'key');

        return view('pages.' . $slug, compact('images', 'settings'));
    }
}
