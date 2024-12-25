<?php

namespace App\Http\Controllers;

use App\Models\DatKel;
use App\Models\komunitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $datkel=DatKel::all();
        return view('operatorr.daftarkeluarga', compact('datkel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $komunitas = komunitas::all();

        return view('operatorr.inputdatkel', compact( 'komunitas'));
    }

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
        'jmh_anggota' => 'required|numeric',  // Added numeric validation
        'alamat' => 'required',
        'no_rumah' => 'required|numeric',  // Added numeric validation
        'gambar_rumah' => 'required|mimes:png,jpg|max:1024',
        'gambar_kk' => 'required|mimes:png,jpg|max:1024',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'bantuan' => 'array|nullable',  // Make 'bantuan' optional
        'bantuan.*' => 'in:KIP,KIS,PBH,PKH',  // Validate each item in 'bantuan' array
    ], $message);

    try {
        // Menangani upload gambar rumah jika ada
        if ($request->hasFile('gambar_rumah')) {
            $fileName = time() . $request->file('gambar_rumah')->getClientOriginalName();
            $path_rumah = $request->file('gambar_rumah')->storeAs('photos', $fileName, 'public');
            $validasi['gambar_rumah'] = $path_rumah;
        }

        // Menangani upload gambar KK jika ada
        if ($request->hasFile('gambar_kk')) {
            $fileName = time() . $request->file('gambar_kk')->getClientOriginalName();
            $path_kk = $request->file('gambar_kk')->storeAs('photos', $fileName, 'public');
            $validasi['gambar_kk'] = $path_kk;
        }

        // Data CKEditor (Alamat)
        $validasi['alamat'] = $request->input('alamat');

        // Latitude dan Longitude
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Membuat data DatKel baru
        $datkel = new DatKel();
        $datkel->koor_geoloc = DB::raw("POINT($latitude, $longitude)");

        // Simpan bantuan sebagai string jika ada
        if ($request->has('bantuan')) {
            $datkel->bantuan = implode(',', $request->input('bantuan'));
        }

        // Simpan ke database
        $datkel->fill($validasi);
        $datkel->save();

        // Redirect ke halaman operator setelah berhasil
        return redirect('operator')->with('success', 'Data berhasil disimpan!');
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
        $komunitas = komunitas::all();
        $datkel=DatKel::find($id);;
        return view('operatorr.inputdatkel', compact( 'komunitas','datkel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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
        'jmh_anggota' => 'required|numeric', // Added numeric validation
        'alamat' => 'required',
        'no_rumah' => 'required|numeric', // Added numeric validation
        'gambar_rumah' => 'nullable|mimes:png,jpg|max:1024', // Nullable for existing file
        'gambar_kk' => 'nullable|mimes:png,jpg|max:1024', // Nullable for existing file
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'bantuan' => 'array|nullable', // Make sure 'bantuan' is optional
        'bantuan.*' => 'in:KIP,KIS,PBH,PKH', // Validate each item in bantuan array
    ], $message);

    try {
        // Menangani upload gambar rumah jika ada
        if ($request->hasFile('gambar_rumah')) {
            $fileName = time() . $request->file('gambar_rumah')->getClientOriginalName();
            $path_rumah = $request->file('gambar_rumah')->storeAs('photos', $fileName, 'public');
            $validasi['gambar_rumah'] = $path_rumah;
        }

        // Menangani upload gambar KK jika ada
        if ($request->hasFile('gambar_kk')) {
            $fileName = time() . $request->file('gambar_kk')->getClientOriginalName();
            $path_kk = $request->file('gambar_kk')->storeAs('photos', $fileName, 'public');
            $validasi['gambar_kk'] = $path_kk;
        }

        // Data CKEditor (Alamat)
        $validasi['alamat'] = $request->input('alamat');

        // Latitude dan Longitude
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Update Koordinat Geolocation
        $datkel = DatKel::findOrFail($id);
        $datkel->koor_geoloc = DB::raw("POINT($latitude, $longitude)");

        // Simpan Bantuan sebagai string, jika ada
        if ($request->has('bantuan')) {
            $datkel->bantuan = implode(',', $request->input('bantuan'));
        }

        // Save geolocation and other data
        $datkel->save();

        // Update the DatKel model with the validated data
        $datkel->update($validasi);

        // Redirect ke halaman operator setelah berhasil
        return redirect('operator')->with('success', 'Data berhasil disimpan!');
    } catch (\Exception $e) {
        // Tangani error dan tampilkan pesan error
        return back()->withErrors(['error' => $e->getMessage()]);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $datkel = DatKel::findOrFail($id);
            $datkel->delete();

            return redirect('operator')->with('success', 'Data berhasil dihapus!');
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
