<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

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

        // ១. បង្កើត Throttle Key (សម្គាល់តាម Email + IP Address)
        $throttleKey = Str::lower($request->input('email')) . '|' . $request->ip();

        // ២. ពិនិត្យមើលថាបញ្ចូលខុសលើស ៣ ដង ឬនៅ?
        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            $minutes = ceil($seconds / 60);

            return back()->withErrors([
                'email' => "អ្នកបានបញ្ចូលលេខសម្ងាត់ខុសលើស ៣ ដង។ សូមរង់ចាំចំនួន {$minutes} នាទីទៀត ទើបអាចព្យាយាមម្ដងទៀត។",
            ])->onlyInput('email');
        }

        // ៣. ផ្ទៀងផ្ទាត់ការ Login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // លុបចំនួនដងដែលសាកល្បងខុសចេញ នៅពេល Login ជោគជ័យ
            RateLimiter::clear($throttleKey);

            // Admin will go to Dashboard
            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard');
            }

            // Client will go to Homepage
            if (Auth::user()->role === 'user') {
                return redirect()->route('homeforclient');
            }

            return redirect()->intended('/dashboard');
        }

        // ៤. ប្រសិនបើ Login បរាជ័យ កត់ត្រាចូល RateLimiter (ផ្អាក ៣ នាទី = 180 វិនាទី)
        RateLimiter::hit($throttleKey, 180);

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