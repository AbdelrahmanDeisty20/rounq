<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'phone' => '0500000000',
            'whatsapp' => '966500000000',
            'email' => 'info@rounq.com',
            'address' => 'القصيم، المملكة العربية السعودية',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
