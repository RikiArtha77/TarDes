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
use Illuminate\Support\Facades\Storage;

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
                return redirect()->route('landing')->with('success', 'Login berhasil!');
            }
        }

        return back()->withErrors(['login' => 'Username atau password salah.']);
    }

    public function logout()
    {
        Auth::guard('operator')->logout();
        return redirect()->route('landing')->with('success', 'Logout berhasil!');
    }

    public function showRegisterForm()
    {
        return view('operatorr.registerForm');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:operators,username',
            'email' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        // Create operator with level set to 1 (user by default)
        $operator = Operator::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => 1
        ]);

        Auth::guard('operator')->login($operator);

        return redirect()->route('operator.daftarkeluarga')->with('success', 'Registrasi dan login berhasil!');
    }

    public function showUserProfile()
{
    $operator = Auth::guard('operator')->user();

    // Load operator-related data
    $biodata = Biodata::where('operator_id', $operator->id)->first();
    $komunitas = komunitas::all();
    $banjar = Banjar::all();
    $pekerjaan = Pekerjaan::all();

    return view('frontpage.profil', compact('operator', 'biodata', 'komunitas', 'banjar', 'pekerjaan'));
}

public function updateUserProfile(Request $request)
{
    $validatedData = $request->validate([
        'nama_kepala_keluarga' => 'nullable|string|max:255',
        'nik' => 'nullable|numeric',
        'kk' => 'nullable|numeric',
        'pekerjaan_id' => 'nullable|exists:pekerjaan,pekerjaan_id',
        'alamat' => 'nullable|string|max:255',
        'komunitas_id' => 'nullable|exists:komunitas,komunitas_id',
        'banjar_id' => 'nullable|exists:banjar,banjar_id',
        'foto_kk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'foto_rumah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'jumlah_anggota' => 'nullable|numeric',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
    ]);

    try {
        // Get the logged-in operator
        $operator = Auth::guard('operator')->user();
        if (!$operator) {
            return redirect()->route('login')->withErrors(['error' => 'Anda harus login terlebih dahulu.']);
        }

        // Handle image upload for foto_rumah
        if ($request->hasFile('foto_rumah')) {
            $fileName = time() . '_' . $request->file('foto_rumah')->getClientOriginalName();
            $path_rumah = $request->file('foto_rumah')->storeAs('foto_rumah', $fileName, 'public');
            $validatedData['foto_rumah'] = $path_rumah;
        }

        // Handle image upload for foto_kk
        if ($request->hasFile('foto_kk')) {
            $fileName = time() . '_' . $request->file('foto_kk')->getClientOriginalName();
            $path_kk = $request->file('foto_kk')->storeAs('foto_kk', $fileName, 'public');
            $validatedData['foto_kk'] = $path_kk;
        }

        // Check if Biodata exists for the operator_id, else create a new one
        $biodata = Biodata::updateOrCreate(
            ['operator_id' => $operator->operator_id], // check if operator_id exists
            $validatedData  // update with new data
        );

        return redirect()->route('landing')->with('success', 'Data berhasil disimpan!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
    }
}
}