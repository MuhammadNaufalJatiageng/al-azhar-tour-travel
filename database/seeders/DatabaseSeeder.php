<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AffiliateProfile;
use App\Models\Airline;
use App\Models\Banner;
use App\Models\category;
use App\Models\Partner;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
        
        Category::create([
            'name' => 'Umrah'
        ]);

        Category::create([
            'name' => 'Haji'
        ]);

        Airline::create([
            'name' => "Garuda Indonesia"
        ]);

        Airline::create([
            'name' => "Saudi Airlines"
        ]);

        Banner::create([
            'image' => 'partner/desktop.jpg',
            'version' => 'desktop'
        ]);
        Banner::create([
            'image' => 'partner/mobile.jpg',
            'version' => 'mobile'
        ]);
        Partner::create([
            'image' => 'partner/garuda-indonesia.png',
            'banner' => false
        ]);

        Video::create([
            'link' => "https://www.youtube.com/embed/SsGDipYteiQ?autoplay=1&mute=1",
            'section' => "documentation"
        ]);
        Video::create([
            'link' => "https://www.youtube.com/embed/SsGDipYteiQ?autoplay=1&mute=1",
            'section' => "testimonial"
        ]);
    }
}
