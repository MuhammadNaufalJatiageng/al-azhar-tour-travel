<?php

namespace App\Http\Controllers;

use App\Models\AffiliateProfile;
use App\Models\Aggrement;
use App\Models\Airline;
use App\Models\category;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Registrant;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() 
    {
        return view('pages.admin.dashboard', [
            'categories' => Category::all(),
            'airlines' => Airline::all(),
            'partners' =>Partner::where('banner', 0)->paginate(5),
            'banner' => Partner::where('banner', 1)->first(),
            'products' => Product::all(),
            "documentations" => Video::where('section', "documentation")->get(),
            "testimonials" => Video::where('section', "testimonial")->get(),
            "aggHajj" => Aggrement::where('for', "haji dan umrah")->first(),
            "aggAff" => Aggrement::where('for', "affiliate")->first(),
        ]);
    }
// sCHEDULE
    public function scheduleIndex()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('pages.admin.schedule.index', [
            'categories' => Category::all(),
            'airlines' => Airline::all(),
            'products' => $products,
        ]);

    }

    public function scheduleStore(Request $request)
    {
        $validated =  $request->validate([
            'category_id' => 'required', 
            'title' => 'required', 
            'double' => 'required', 
            'triple' => 'required', 
            'quad' => 'required', 
            'departureDate' => 'required', 
            'hotelMekkah' => 'required', 
            'hotelMadinah' => 'required', 
            'poster' => 'required|image|mimes:jpeg,jpg,png', 
            'airline' => 'required', 
        ]);

        $validated['category_id'] = $request->category_id;
        $validated['title'] = $request->title;
        $validated['double'] = $request->double;
        $validated['triple'] = $request->triple;
        $validated['quad'] = $request->quad;
        $validated['departureDate'] = Carbon::parse($request->departureDate);

        if ($validated['departureDate'] < Carbon::now()) {
            $validated['status'] = false;
        } else {
            $validated['status'] = true;
        }
        
        $validated['poster'] = $request->file('poster')->store('schedule', 'public');

        $validated['hotelMekkah'] = $request->hotelMekkah;
        $validated['hotelMadinah'] = $request->hotelMadinah;
        $validated['airline'] = $request->airline;

        Product::create($validated);
        return redirect('/admin/schedule')->with('success', 'Jadwal telah ditambahkan.');
    }

    public function scheduleDetail(Product $product, $id)
    {
        $product = Product::find($id);
        return view('pages.admin.schedule.detail', [
            'product' => $product,
            'categories' => category::all()
        ]);
    }
    
    public function scheduleUpdate(Request $request, $id)
    {
        $product = Product::find($id);

        $validated =  $request->validate([
            'category_id' => 'required', 
            'title' => 'required', 
            'price' => 'required', 
            'hotelMekkah' => 'required', 
            'hotelMadinah' => 'required', 
            'departureDate' => 'required', 
            'poster' => 'image|mimes:jpeg,jpg,png', 
            'airline' => 'required', 
        ]);

        if ($request->hasFile('poster')) 
        {
            // Delete old poster
            Storage::delete('public/'.$product->poster);

            // Store new poster
            $validated['poster'] = $request->file('poster')->store('schedule', 'public');
        }
        
        $product->update($validated);

        return back()->with('success', 'Berhasil memperbarui data.');
    }

    public function ScheduleDestroy(Product $product, $id)
    {
        $product = Product::find($id);

        // Delete poster
        Storage::delete('public/'.$product->poster);

        $product->delete();
        
        return back()->with("success", "Jadwal telah dihapus.");

    }
// eND sCHEDULE
    
// REGISTRANT
    public function registrantIndex(Request $request)
    {
        $registrant = Registrant::paginate(20);

        if ($request->by == "nama") {
            $registrant = Registrant::where('name', 'like',"%".$request->keyword."%")->paginate(20);
        }
        if ($request->by == "paket") {
            $registrant = Registrant::where('packet', 'like',"%".$request->keyword."%")->paginate(20);
        }
        if ($request->by == "tipe") {
            $registrant = Registrant::where('number_of_registrans', 'like',"%".$request->keyword."%")->paginate(20);
        }

        return view('pages.admin.registrant.index', [
            'registrants' => $registrant
        ]);
    }

    public function registrantShow(Registrant $registrant, $id)
    {
        $data = $registrant::findOrFail($id);

        return view('pages.admin.registrant.show', [
            'data' => $data,
            'registrants' => $data->registrantDetails()->get()
        ]);
    }
// END REGISTRANT

// AFFILIATE
    public function affiliateIndex()
    {
        return view('pages.admin.affiliate.index', [
            'affiliates' => User::where('role', 'affiliate')->get()
        ]);
    }

    public function affiliateSearch(Request $request)
    {
        $users = User::where('role', 'affiliate')->get();

        $result = [];
        
        foreach ($users as $key => $user) {
            if ($user->affiliateProfile->affiliate_code == $request->keyword) {
                array_push($result, $user);
            }
        }

        return view('pages.admin.affiliate.index', [
            'affiliates' => collect($result)
        ]);
    }
// END AFFILIATE
    
}
