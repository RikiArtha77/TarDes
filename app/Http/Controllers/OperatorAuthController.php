<?php

namespace App\Http\Controllers;

use App\Models\Banjar;
use App\Models\Biodata;
use App\Models\komunitas;
use App\Models\Operator;
use App\Models\Pekerjaan;
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
        return redirect()->route('operator.LoginForm')->with('success', 'Logout berhasil!');
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

        // Create operator with level set to 1 (user by default)
        $operator = Operator::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), // Hash the password
            'level' => 1
        ]);

        Auth::guard('operator')->login($operator);

        return redirect()->route('operator.daftarkeluarga')->with('success', 'Registrasi dan login berhasil!');
    }

    public function showUserProfile()
    {
         // Mendapatkan operator yang sedang login
        $operator = Auth::guard('operator')->user();

        // Memuat data terkait operator
        $biodata = Biodata::where('operator_id', $operator->id)->first();
        $komunitas = Komunitas::all();
        $banjar = Banjar::all();
        $pekerjaan = Pekerjaan::all();

        // Mengirim data ke view
        return view('frontpage.profil', compact('operator', 'biodata', 'komunitas', 'banjar', 'pekerjaan'));
    }

    public function updateUserProfile(Request $request)
{
    $request->validate([
        'nama_kepala_keluarga' => 'nullable|string|max:255',
        'nik' => 'nullable|digits:16',
        'kk' => 'nullable|digits:16',
        'pekerjaan_id' => 'nullable|exists:pekerjaan,id',
        'alamat' => 'nullable|string|max:255',
        'komunitas_id' => 'nullable|exists:komunitas,id',
        'banjar_id' => 'nullable|exists:banjar,id',
        'foto_kk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'foto_rumah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'jumlah_keluarga' => 'nullable|integer|min:1',
    ]);

    // Mendapatkan operator yang sedang login
    $operator = Auth::guard('operator')->user();

    // Upload file jika ada
    $fotoKkPath = $request->hasFile('foto_kk') 
        ? $request->file('foto_kk')->store('foto_kk', 'public') 
        : null;

    $fotoRumahPath = $request->hasFile('foto_rumah') 
        ? $request->file('foto_rumah')->store('foto_rumah', 'public') 
        : null;

    // Update atau buat data biodata
    Biodata::updateOrCreate(
        ['operator_id' => $operator->id],
        [
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'nik' => $request->nik,
            'kk' => $request->kk,
            'pekerjaan_id' => $request->pekerjaan_id,
            'alamat' => $request->alamat,
            'komunitas_id' => $request->komunitas_id,
            'banjar_id' => $request->banjar_id,
            'foto_kk' => $fotoKkPath ?? $operator->biodata->foto_kk ?? null,
            'foto_rumah' => $fotoRumahPath ?? $operator->biodata->foto_rumah ?? null,
            'jumlah_keluarga' => $request->jumlah_keluarga,
        ]
    );

    return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui!');
}

}