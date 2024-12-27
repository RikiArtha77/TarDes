<?php

namespace App\Http\Controllers;

use App\Models\DatKel;
use App\Models\komunitas;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datkel=DatKel::all();
        return view('frontpage.landingpage', compact('datkel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $komunitas = komunitas::all();

        return view('frontpage.formdaftar', compact( 'komunitas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
{
    // Pesan error kustom
    $message = [
        'required' => 'Kolom :attribute harus lengkap',
        'numeric' => 'Kolom :attribute harus angka',
        'file' => 'Perhatikan format dan ukuran data'
    ];

    // Validasi input
    $validasi = $request->validate([
        'nama_kpl' => 'required',
        'komunitas_id' => 'required',
        'NIK' => 'required',
        'Pekerjaan' => 'required',
        'No_KK' => 'required',
        'jmh_anggota' => 'required|numeric',
        'alamat' => 'required',
        'no_rumah' => 'required|numeric',
        'gambar_rumah' => 'required|mimes:png,jpg|max:1024',
        'gambar_kk' => 'required|mimes:png,jpg|max:1024',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
    ], $message);

    try {
        // Menangani upload gambar rumah jika ada
        if ($request->hasFile('gambar_rumah')) {
            $fileName = time() . $request->file('gambar_rumah')->getClientOriginalName();
            $path_rumah = $request->file('gambar_rumah')->storeAs('gambar_rumah', $fileName, 'public');
            $validasi['gambar_rumah'] = $path_rumah;
        }

        // Menangani upload gambar KK jika ada
        if ($request->hasFile('gambar_kk')) {
            $fileName = time() . $request->file('gambar_kk')->getClientOriginalName();
            $path_kk = $request->file('gambar_kk')->storeAs('gambar_kk', $fileName, 'public');
            $validasi['gambar_kk'] = $path_kk;
        }

        // Simpan data ke database
        $response = DatKel::create($validasi);

        return redirect('landing')->with('success', 'Data berhasil disimpan!');
    } catch (\Exception $e) {
        // Tangani error dan tampilkan pesan error
        return back()->withErrors(['error' => $e->getMessage()]);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
