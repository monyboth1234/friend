<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // បង្ហាញ Form Register
    public function showRegister()
    {
        return view('auth.register');
    }

    // ចុះឈ្មោះ (Register Process)
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|min:3',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user', // កំណត់ Role តាមលំនាំដើម
        ]);

        return redirect()->route('login')->with('success', 'ចុះឈ្មោះជោគជ័យ! សូមចូលប្រព័ន្ធ។');
    }

    // បង្ហាញ Form Login
    public function showLogin()
    {
        return view('auth.login');
    }

    // ចូលប្រព័ន្ធ (Login Process)
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // // បង្វែរទិសដៅតាម Role
            // if (Auth::user()->role === 'admin') {
            //     return redirect()->intended('/dashboard');
            // }

            // Admin will go to Dashboard
            if(Auth::user()->role === 'admin'){
                return redirect()->route('dashboard');
            }


            // Client will go to Homepage
            if(Auth::user()->role === 'client'){
                return redirect()->route('hompage');
            }

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([ 
            'email' => 'អ៊ីមែល ឬពាក្យសម្ងាត់មិនត្រឹមត្រូវឡើយ។',
        ])->onlyInput('email');
    }

    // ចាកចេញ (Logout Process)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}