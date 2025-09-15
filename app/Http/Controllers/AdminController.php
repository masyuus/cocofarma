<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            // Simpan role ke session
            $user = Auth::user();
            session(['role' => $user->role]);
            // Redirect ke dashboard, bisa dibedakan jika ingin
            return redirect()->back()->with('success', 'Login berhasil! Selamat datang di Backoffice.');
        }

        return redirect()->back()->withInput()->with('error', 'Login gagal! Username atau password salah.');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
    Auth::logout();
    $request->session()->forget('role');
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    // Redirect ke form login admin
    return redirect()->route('admin.login');
    }
}
