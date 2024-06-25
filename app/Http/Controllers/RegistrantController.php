<?php

namespace App\Http\Controllers;

use App\Models\AffiliateProfile;
use App\Models\Registrant;
use Illuminate\Http\Request;

class RegistrantController extends Controller
{
    public function index($affiliateCode = false)
    {
        return view('pages.user.user-form', ['affiliateCode' => $affiliateCode ]);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required',
        ]);

        $validated['fullname'] = $request->fullname;

        if ($request->affiliate_code) 
        {
            $affiliate = AffiliateProfile::where('affiliate_code', $request->affiliate_code)->first();

            if ($affiliate) 
            {
                $validated['affiliate_code'] = $request->affiliate_code;
            } 
            else
            {
                return back()->with("fail", "Kode affiliate tidak ditemukan");
            }
        }
        
        Registrant::create($validated);

        return back()->with('success', "Terimakasih sudah mendaftar");
    }
}
