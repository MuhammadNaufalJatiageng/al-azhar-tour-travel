<?php

namespace App\Http\Controllers;

use App\Models\AffiliateProfile;
use App\Models\Product;
use App\Models\Registrant;
use App\Models\RegistrantDetail;
use Illuminate\Http\Request;

class RegistrantController extends Controller
{
    public function index($affiliateCode = false)
    {
        return view('pages.user.first-form', [
            'affiliateCode' => $affiliateCode, 
            'products' => Product::where('status', true)->get()
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'phone_number' => 'required',
            'packet' => 'required',
            'numOfRegistrans' => 'required',
        ]);


        return view('pages.user.second-form', [
            "numOfRegistrans" => intval($request->numOfRegistrans),
            'packet' => $request->packet,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'affiliate_code' => $request->affiliate_code,
        ]);
    }

    public function secondForm()
    {
        return view('pages.user.second-form');
    }

    public function submitForm(Request $request)
    {
        $registrant['name'] = $request->name[0];
        $registrant['email'] = $request->email;
        $registrant['phone_number'] = $request->phone_number;
        $registrant['packet'] = $request->packet;
        $registrant['number_of_registrans'] = $request->numOfRegistrans;
        
        if ($request->affiliate_code) 
        {
            $affiliate = AffiliateProfile::where('affiliate_code', $request->affiliate_code)->first();

            if ($affiliate) 
            {
                $registrant['affiliate_code'] = $request->affiliate_code;
            } 
            else
            {
                return back()->with("fail", "link affiliate tidak ditemukan.");
            }
        }

        // Registrant Detail

        Registrant::create($registrant);

        $newRegistrans = Registrant::where('email', $request->email)->latest()->first();

        $names = $request->name;

        foreach ($names as $name) {
            $registDetail['name'] = $name;
            $registDetail['registrant_id'] = $newRegistrans->id;
            RegistrantDetail::create($registDetail);
        };


        return back()->with('success', 'Data sudah terkirim, terimakasih atas kepercayaan anda.');
    }
}
