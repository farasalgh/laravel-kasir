<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;
            return $role === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('kasir.dashboard');
        }

        return back()->withErrors(['login' => 'Email atau password salah.']);
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        //validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        //cek apakah sudah ada user admin
        if(User::where('role', 'admin')->exists()){
            return redirect()->route('login')->withErrors(['register' => 'Registrasi ditutup. Sudah ada user admin yang terdaftar.']);
        }

        // Buat user admin pertama
        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        Auth::login($admin);

        return redirect()->route('admin.dashboard')->with('status', 'Registrasi berhasil. Anda telah login sebagai admin.');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('status', 'Anda telah berhasil logout.');
    }
}
