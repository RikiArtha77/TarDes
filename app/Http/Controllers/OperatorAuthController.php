<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OperatorAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('operator.LoginForm');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Authenticate using guard 'operator'
        if (Auth::guard('operator')->attempt($request->only('username', 'password'))) {
            return redirect()->route('operator.daftarkeluarga')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['login' => 'Username atau password salah.']);
    }

    public function logout()
    {
        Auth::guard('operator')->logout();
        return redirect()->route('operator.LoginForm')->with('success', 'Logout berhasil!');
    }
}