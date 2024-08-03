<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Banner;
use App\Models\Partner;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function airlineStore(Request $request)
    {
        $validated = $request->validate([
            'airline_name' => "required"
        ]);

        $validated['name'] = $request->airline_name;

        Airline::create($validated);

        return back()->with('success', "Berhasil menambahkan maskapai.");
    }

    public function airlineDestroy($id)
    {
        $airline = Airline::find($id);

        $airline->delete();

        return back()->with("success", "Berhasil menghapus maskapai.");
    }

// Partner
    public function partnerStore(Request $request)
    {
        $validated = $request->validate([
            'image' => "required|image|mimes:jpeg,jpg,png|max:100"
        ]);

        $validated['image'] = $request->file('image')->store('partner', 'public');
        $validated['banner'] = false;

        Partner::create($validated);

        return back()->with('success', "Berhasil menambahkan mitra.");
    }

    public function partnerDestroy($id)
    {
        $partner = Partner::find($id);

        Storage::delete('public/'.$partner->image);

        $partner->delete();

        return back()->with("success", "Berhasil menghapus mitra.");
    }

// Banner
    public function bannerStore(Request $request)
    {
        $validated = $request->validate([
            'desktop' => "required|image|mimes:jpeg,jpg,png",
            'mobile' => "required|image|mimes:jpeg,jpg,png"
        ]);

        $oldBanner = Banner::all();

        foreach ($oldBanner as $value) {
            Storage::delete('public/'.$value->image);
        }

        Banner::truncate();
        
        $validated['image'] = $request->file('desktop')->store('partner', 'public');
        $validated['version'] = "desktop";

        Banner::create($validated);

        $validated['image'] = $request->file('mobile')->store('partner', 'public');
        $validated['version'] = "mobile";

        Banner::create($validated);

        return back()->with('success', "Berhasil mengubah banner.");
    }

// VIDEO
    public function documentationStore(Request $request) 
    {
        $validated = $request->validate([
            "documentation" => "required"
        ]);

        $validated['link'] = $request->documentation;
        $validated['section'] = 'documentation';

        Video::create($validated);

        return back()->with('success', "Berhasil menambahkan video dokumentasi.");
    }

    public function testimonialStore(Request $request) 
    {
        $validated = $request->validate([
            "testimonial" => "required"
        ]);

        $validated['link'] = $request->testimonial;
        $validated['section'] = 'testimonial';

        Video::create($validated);

        return back()->with('success', "Berhasil menambahkan video testimoni.");
    }

    public function videoDestroy($id)
    {
        $video = Video::find($id);

        $video->delete();

        return back()->with("success", "Berhasil menghapus link video.");
    }
}
