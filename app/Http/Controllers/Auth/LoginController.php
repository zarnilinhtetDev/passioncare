<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function username()
    // {
    //     return 'phno'; // Assuming your column name for phone number is 'phone'
    // }

    public function userLogin(Request $request)
    {
        // dd($request);
        // Validate the request
        $credentials = null;

        $phone = User::where('phno', $request->email)->get()->first();
        $email = User::where('email', $request->email)->get()->first();

        // dd($phone);
        if ($phone) {
            // if ($request->has('email') && $request->phno !== null) {
            $credentials = ["phno" => $request->email, "password" => $request->password];
            // }
        }

        // dd($credentials);
        if ($email) {
            // if ($request->has('email') && $request->email !== null) {
            $credentials = $request->only('email', 'password');
        }


        // dd($credentials);
        if ($credentials != null) {
            if (auth()->attempt($credentials)) {
                if (auth()->user()->type == 'patient' || auth()->user()->type == 'hospital') {
                    return redirect('/home')->with('success', 'Welcome back ' . auth()->user()->name);
                } elseif (auth()->user()->type == 'mo') {
                    return redirect('/mo_home')->with('success', 'Welcome back ' . auth()->user()->name);
                } else {
                    return back()->withErrors(['email' => 'Email, Phone number or password is incorrect.']);
                };
                // return redirect('/home')->with('success', 'Welcome back ' . auth()->user()->name);
            } else {
                return back()->withErrors(['email' => 'Email, Phone number or password is incorrect.']);
            };
        } else {
            return back()->withErrors(['email' => 'Email or Phone number is incorrect.']);
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function forgetPassword()
    {
        return view('auth.forget_password');
    }

    public function termOfUse()
    {
        return view('landing_page.term_of_use');
    }
}
