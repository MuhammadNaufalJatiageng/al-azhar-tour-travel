<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Product;

class LandingPage extends Controller
{
    public function tourPackage()
    {
        return view('pages.landing-page.tour-package', [
            'products' => Product::orderBy('category_id', "DESC")->orderBy('departureDate', "DESC")->get(),
            "banner" => Partner::where('banner', 1)->first()
        ]);
    }

    public function aboutUs()
    {
        return view('pages.landing-page.about-us', [
            "banner" => Partner::where('banner', 1)->first()
        ]);
    }
}
