<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OperatorAuthController extends Controller
{
    // Kredensial operator yang sudah ditentukan
    private $operatorCredentials = [
        'username' => 'operator123',
        'password' => 'op445', // Bisa diganti dengan hash bcrypt
    ];

    // Tampilkan halaman login operator
    public function showLoginForm()
    {
        return view('operator.LoginForm');
    }

    // Proses login operator
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Verifikasi username dan password
        if (
            $request->username === $this->operatorCredentials['username'] &&
            $request->password === $this->operatorCredentials['password']
        ) {
            // Set session operator
            session(['is_operator' => true]);

            return redirect()->route('operator.dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['login' => 'Username atau password salah.']);
    }

    // Dashboard operator
    public function dashboard()
    {
        return view('operator.daftarkeluarga'); // Buat view untuk dashboard operator
    }

    // Logout operator
    public function logout()
    {
        session()->forget('is_operator');
        return redirect()->route('operator.login')->with('success', 'Anda telah logout.');
    }
}