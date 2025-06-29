<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]); 

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Redirect to the intended page or home
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        // If authentication fails, redirect back with an error message
        return back()->with('loginError','Login anda gagal, silakan coba lagi!');
    }

    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the login page with a success message
        return redirect('/login');
    }
}
