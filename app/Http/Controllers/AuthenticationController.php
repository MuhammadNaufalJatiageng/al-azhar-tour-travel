<?php

namespace App\Http\Controllers;

use App\Models\AffiliateProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    public function affiliateRegisterIndex()
    {
        return view('pages.authenticate.affiliate-register');
    }

    public function affiliateLoginIndex()
    {
        return view('pages.authenticate.affiliate-login');
    }

    public function adminLoginIndex() 
    {
        return view('pages.authenticate.admin-login');
    }

    public function login(Request $request, $role)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        
        if ($role === 'admin') 
        {
            $user = User::where('email', $request->email)->where('role', 'admin')->first();

            if ($user) 
            {
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
        
                    return redirect()->intended('/admin/dashboard');
                }
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        if ($role === 'affiliate') 
        {
            $user = User::where('email', $request->email)->where('role', 'affiliate')->first();

            if ($user) 
            {
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
        
                    return redirect()->intended('/affiliate/dashboard');
                }
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function affiliateCodeGenerate()
    {   
        $affiliateCode = strtoupper(Str::random(10));

        $code_check = AffiliateProfile::where('affiliate_code', $affiliateCode)->first();

        if ($code_check)
        {
            return $this->affiliateCodeGenerate();
        }
        
        return $affiliateCode;
    }

    public function affiliateRegister(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|min:3',
            'email' => 'required|email:dns',
            'phoneNumber' => 'required',
            'password' => 'required|min:8',
        ]);
        
        $validated['name'] = $request->username;
        $validated['email'] = $request->email;
        $validated['phone_number'] = $request->phoneNumber;
        $validated['role'] = 'affiliate';
        $validated['password'] = bcrypt($request->password);

        User::create($validated);

        $newUser = User::where('email', $request->email)->first();

        $userProfle['username'] = $request->username;
        $userProfle['user_id'] = $newUser->id;

        $userProfle['affiliate_code'] = $this->affiliateCodeGenerate();


        AffiliateProfile::create($userProfle);

        return redirect('/affiliate/login');
    }

    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
