<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Partner;
use App\Models\Product;

class LandingPage extends Controller
{
    public function tourPackage()
    {
        return view('pages.landing-page.tour-package', [
            'products' => Product::orderBy('category_id', "DESC")->orderBy('departureDate', "DESC")->get(),
            "desktop" => Banner::where('version', 'desktop')->first(),
            "mobile" => Banner::where('version', 'mobile')->first(),
        ]);
    }

    public function aboutUs()
    {
        return view('pages.landing-page.about-us', [
            "desktop" => Banner::where('version', 'desktop')->first(),
            "mobile" => Banner::where('version', 'mobile')->first(),
        ]);
    }
}
