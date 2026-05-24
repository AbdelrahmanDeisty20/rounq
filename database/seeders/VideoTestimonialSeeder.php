<?php

namespace Database\Seeders;

use App\Models\SiteImage;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class VideoTestimonialSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed into site_images for compatibility
        SiteImage::updateOrCreate(
            ['section' => 'video-testimonial'],
            [
                'title' => 'رأي عميل مصور بالفيديو',
                'url' => 'assets/WhatsApp Video 2026-05-18 at 2.04.52 PM.mp4',
                'is_active' => true,
            ]
        );

        // 2. Seed into testimonials table exactly like AzlQassim
        Testimonial::updateOrCreate(
            ['video' => 'assets/WhatsApp Video 2026-05-18 at 2.04.52 PM.mp4'],
            [
                'name' => 'عميل مميز',
                'city' => 'القصيم',
                'rating' => 5,
                'svc' => 'فيديو',
                'text' => 'تجربة ممتازة في النقل والفك والتركيب الاحترافي',
                'status' => 'active',
            ]
        );
    }
}
