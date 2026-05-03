<?php

namespace Database\Seeders;

use App\Models\SiteImage;
use Illuminate\Database\Seeder;

class SiteImageSeeder extends Seeder
{
    public function run(): void
    {
        SiteImage::truncate();

        $images = [
            // Hero
            [
                'section' => 'hero',
                'title' => 'صورة خلفية Hero Section',
                'location_hint' => 'الصفحة الرئيسية — خلفية كاملة',
                'url' => 'https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=1400&q=80',
            ],
            // Services
            [
                'section' => 'service-1',
                'title' => 'نقل عفش مع الفك والتركيب',
                'location_hint' => 'قسم الخدمات — كرت 1',
                'url' => 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=400&q=80',
            ],
            [
                'section' => 'service-2',
                'title' => 'نقل أثاث مع التحميل والتنزيل',
                'location_hint' => 'قسم الخدمات — كرت 2',
                'url' => 'https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=400&q=80',
            ],
            [
                'section' => 'service-3',
                'title' => 'نقل عفش بالضمان',
                'location_hint' => 'قسم الخدمات — كرت 3',
                'url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&q=80',
            ],
            [
                'section' => 'service-4',
                'title' => 'النقل الآمن للأثاث',
                'location_hint' => 'قسم الخدمات — كرت 4',
                'url' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=400&q=80',
            ],
            [
                'section' => 'service-5',
                'title' => 'أرخص شركة نقل عفش بالقصيم',
                'location_hint' => 'قسم الخدمات — كرت 5',
                'url' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=400&q=80',
            ],
            [
                'section' => 'service-6',
                'title' => 'تغليف الأثاث قبل النقل',
                'location_hint' => 'قسم الخدمات — كرت 6',
                'url' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?w=400&q=80',
            ],
            [
                'section' => 'service-7',
                'title' => 'فك وتركيب غرف النوم والمطابخ',
                'location_hint' => 'قسم الخدمات — كرت 7',
                'url' => 'https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=400&q=80',
            ],
            [
                'section' => 'service-8',
                'title' => 'نقل عفش بين المدن',
                'location_hint' => 'قسم الخدمات — كرت 8',
                'url' => 'https://images.unsplash.com/photo-1464082354059-27db6ce50048?w=400&q=80',
            ],
            // Steps
            [
                'section' => 'step-1',
                'title' => 'الخطوة ١ — تواصل معنا',
                'location_hint' => 'قسم خطوات العمل',
                'url' => 'https://images.unsplash.com/photo-1534536281715-e28d76689b4d?w=400&q=80',
            ],
            [
                'section' => 'step-2',
                'title' => 'الخطوة ٢ — تحديد حجم العفش',
                'location_hint' => 'قسم خطوات العمل',
                'url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&q=80',
            ],
            [
                'section' => 'step-3',
                'title' => 'الخطوة ٣ — المعاينة والاتفاق',
                'location_hint' => 'قسم خطوات العمل',
                'url' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=400&q=80',
            ],
            [
                'section' => 'step-4',
                'title' => 'الخطوة ٤ — التغليف والفك',
                'location_hint' => 'قسم خطوات العمل',
                'url' => 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=400&q=80',
            ],
            [
                'section' => 'step-5',
                'title' => 'الخطوة ٥ — التحميل والنقل',
                'location_hint' => 'قسم خطوات العمل',
                'url' => 'https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=400&q=80',
            ],
            [
                'section' => 'step-6',
                'title' => 'الخطوة ٦ — التنزيل والتركيب',
                'location_hint' => 'قسم خطوات العمل',
                'url' => 'https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=400&q=80',
            ],
            // Gallery
            [
                'section' => 'gallery-trucks',
                'title' => 'معرض — شاحنات النقل',
                'location_hint' => 'معرض الأعمال — صورة كبيرة',
                'url' => 'https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=800&q=80',
            ],
            [
                'section' => 'gallery-packing',
                'title' => 'معرض — التغليف بالكراتين',
                'location_hint' => 'معرض الأعمال — صورة 2',
                'url' => 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=500&q=80',
            ],
        ];

        foreach ($images as $image) {
            SiteImage::create($image);
        }
    }
}
