<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\accounts;

class AuthController extends Controller
{
    // LOGIN
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth()->user();

            // Cek akun aktif
            if (!$user->is_active) {
                Auth::logout();
                return back()->withErrors(['email' => 'Akun tidak aktif']);
            }

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    // REGISTER (SELALU USER)
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:accounts',
            'password' => 'required|min:6|confirmed'
        ]);

        accounts::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 'user',          // 🔥 dipaksa jadi user
            'is_active' => true
        ]);

        return redirect()->route('login')
            ->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

