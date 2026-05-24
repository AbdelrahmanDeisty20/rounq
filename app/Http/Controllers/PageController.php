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
        $dbTestimonials = \App\Models\Testimonial::whereNotNull('video')->where('status', 'active')->get();
        if ($dbTestimonials->count() > 0) {
            $videoTestimonials = $dbTestimonials->map(function($t) {
                return (object)[
                    'url' => $t->video,
                    'is_active' => $t->status === 'active',
                    'title' => $t->name ?? 'رأي عميل مصور'
                ];
            });
        } else {
            $videoTestimonials = $allImages->where('section', 'video-testimonial')->where('is_active', true);
        }

        $images = [
            'hero' => $allImages->where('section', 'hero'),
            'services' => $allImages->filter(fn($img) => str_starts_with($img->section, 'service-'))->sortBy('section'),
            'steps' => $allImages->filter(fn($img) => str_starts_with($img->section, 'step-'))->sortBy('section'),
            'gallery' => $allImages->filter(fn($img) => str_starts_with($img->section, 'gallery-'))->sortBy('section'),
            'video_testimonials' => $videoTestimonials,
        ];
        
        $settings = SiteSetting::all()->pluck('value', 'key');


        return view('pages.' . $slug, compact('images', 'settings'));
    }

    public function streamVideo(Request $request)
    {
        $path = $request->query('path');
        // Sanitize path to prevent directory traversal
        $path = str_replace(['..', '\\'], ['', '/'], $path);
        $path = ltrim($path, '/');

        $fullPath = public_path($path);

        if (empty($path) || !file_exists($fullPath) || is_dir($fullPath)) {
            abort(404);
        }

        $response = new \Symfony\Component\HttpFoundation\BinaryFileResponse($fullPath);
        \Symfony\Component\HttpFoundation\BinaryFileResponse::trustXSendfileTypeHeader();
        return $response;
    }
}

