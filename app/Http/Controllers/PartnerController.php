<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
    
    public function partnerStore(Request $request)
    {
        $validated = $request->validate([
            'image' => "required|image|mimes:jpeg,jpg,png|max:100"
        ]);

        $myimage = time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path("partner-img"), $myimage);

        $validated['image'] = $myimage;
        $validated['banner'] = false;

        Partner::create($validated);

        return back()->with('success', "Berhasil menambahkan mitra.");
    }

    public function partnerDestroy($id)
    {
        $partner = Partner::find($id);

        $path = public_path("partner-img/" . $partner->image);
        File::delete($path);

        $partner->delete();

        return back()->with("success", "Berhasil menghapus mitra.");
    }

    public function bannerStore(Request $request)
    {
        $banner = Partner::where('banner', 1)->first();

        $validated = $request->validate([
            'banner' => "required|image|mimes:jpeg,jpg,png"
        ]);

        $mybanner = time() . $request->file('banner')->getClientOriginalName();
        $request->file('banner')->move(public_path("partner-img"), $mybanner);

        $validated['image'] = $mybanner;
        $validated['banner'] = true;

        $banner->update($validated);

        if ($request->oldBanner) {
            $path = public_path("partner-img/" . $request->oldBanner);
            File::delete($path);
        }

        return back()->with('success', "Berhasil mengubah banner.");
    }
}
