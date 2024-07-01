<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Registrant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index() 
    {
        return view('pages.admin.dashboard');
    }
    
    public function scheduleIndex()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('pages.admin.schedule.index', [
            'products' => $products,
        ]);

    }

    public function scheduleStore(Request $request)
    {
        $validated =  $request->validate([
            'category' => 'required', 
            'title' => 'required', 
            'price' => 'required', 
            'departureDate' => 'required', 
            'hotelMekkah' => 'required', 
            'hotelMadinah' => 'required', 
            'poster' => 'required|image|mimes:jpeg,jpg,png', 
            'airline' => 'required', 
        ]);

        $validated['category'] = $request->category;
        $validated['title'] = $request->title;
        $validated['price'] = $request->price;
        $validated['departureDate'] = Carbon::parse($request->departureDate);

        if ($validated['departureDate'] < Carbon::now()) {
            $validated['status'] = false;
        } else {
            $validated['status'] = true;
        }
        
        $destinationPath = 'product-img';
        $myimage = time() . $request->file('poster')->getClientOriginalName();
        $request->file('poster')->move(public_path($destinationPath), $myimage);
        
        $validated['poster'] = $myimage;

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
            'product' => $product
        ]);
    }
    
    public function scheduleUpdate(Request $request, $id)
    {
        $product = Product::find($id);

        $validated =  $request->validate([
            'category' => 'required', 
            'title' => 'required', 
            'description' => 'required', 
            'price' => 'required', 
            'departureDate' => 'required', 
            'poster' => 'image|mimes:jpeg,jpg,png', 
            'airline' => 'required', 
        ]);

        if ($request->hasFile('poster')) 
        {
            // Delete old poster
            $path = public_path("product-img/" . $product->poster);
            FIle::delete($path);

            // Store new poster
            $destinationPath = 'product-img';
            $myimage = time() . $request->file('poster')->getClientOriginalName();
            $request->file('poster')->move(public_path($destinationPath), $myimage);

            $validated['poster'] = $myimage;
        }

        
        $product->update($validated);

        return back()->with('success', 'Berhasil memperbarui data.');
    }

    public function ScheduleDestroy(Product $product, $id)
    {
        $product = Product::find($id);

        // Delete poster
        $path = public_path("product-img/" . $product->poster);
        FIle::delete($path);

        $product->delete();
        
        return back()->with("success", "Jadwal telah dihapus.");

    }

    public function registrantIndex()
    {
        return view('pages.admin.registrant.index', [
            'registrants' => Registrant::all()
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

    public function affiliateIndex()
    {
        return view('pages.admin.affiliate.index', [
            'affiliates' => User::where('role', 'affiliate')->get()
        ]);
    }
    
}
