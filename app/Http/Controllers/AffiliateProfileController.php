<?php

namespace App\Http\Controllers;

use App\Models\Registrant;
use Illuminate\Http\Request;

class AffiliateProfileController extends Controller
{
    public function index() 
    {
        return view('pages.affiliate.index', [
            'registrants' => Registrant::where('affiliate_code', auth()->user()->affiliateProfile->affiliate_code)->get()
            ]);
    }
}
