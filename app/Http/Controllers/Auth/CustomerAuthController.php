<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CustomerAuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('pelanggan')->check()) {
            return redirect()->intended('/dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('pelanggan')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    public function showRegisterForm()
    {
        if (Auth::guard('pelanggan')->check()) {
            return redirect('/');
        }
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pelanggan,email',
            'password' => 'required|string|min:8|confirmed',
            'no_wa' => ['required', 'string', 'max:20', 'regex:/^08[0-9]{8,13}$/'],
            'no_ktp_sim' => 'required|string|max:50',
            'alamat_asal' => 'nullable|string',
        ]);

        $pelanggan = Pelanggan::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_wa' => $request->no_wa,
            'no_ktp_sim' => $request->no_ktp_sim,
            'alamat_asal' => $request->alamat_asal,
        ]);

        Auth::guard('pelanggan')->login($pelanggan);

        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('pelanggan')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
