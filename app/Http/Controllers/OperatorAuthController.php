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
        return view('operatorr.LoginForm');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Attempt to authenticate the operator
        if (Auth::guard('operator')->attempt($request->only('username', 'password'))) {
            $operator = Auth::guard('operator')->user();

            // Check the operator's level and redirect accordingly
            if ($operator->level == 2) {
                return redirect()->route('operator.daftarkeluarga')->with('success', 'Login berhasil!');
            } else {
                // Redirect normal users (level 1) to the landing page
                return redirect()->route('landing')->with('success', 'Login berhasil!');
            }
        }

        return back()->withErrors(['login' => 'Username atau password salah.']);
    }

    public function logout()
    {
        Auth::guard('operator')->logout();
        return redirect()->route('operatorr.LoginForm')->with('success', 'Logout berhasil!');
    }

    // Show the registration form
    public function showRegisterForm()
    {
        return view('operatorr.registerForm');
    }

    // Handle the registration logic
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:operators,username',
            'email' => 'required',
            'password' => 'required|confirmed|min:8', // Ensures password confirmation is correct
        ]);

        // Create operator with level set to 2 (operator by default)
        $operator = Operator::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), // Hash the password
            'level' => 2 // Set the level to 2 for operator
        ]);

        Auth::guard('operator')->login($operator);

        return redirect()->route('operator.daftarkeluarga')->with('success', 'Registrasi dan login berhasil!');
    }
}