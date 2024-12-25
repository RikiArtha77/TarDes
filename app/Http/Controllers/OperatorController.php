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
        'jmh_anggota' => 'required',
        'alamat' => 'required',
        'no_rumah' => 'required',
        'gambar_rumah' => 'required|mimes:png,jpg|max:1024',
        'gambar_kk' => 'required|mimes:png,jpg|max:1024',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'bantuan' => 'array',
        'bantuan.*' => 'in:KIP,KIS,PBH,PKH',
    ], $message);

    try {
        
        // Menangani upload gambar rumah
        if ($request->hasFile('gambar_rumah')) {
            $fileName = time() . $request->file('gambar_rumah')->getClientOriginalName();
            $path_rumah = $request->file('gambar_rumah')->storeAs('photos', $fileName, 'public');
            $validasi['gambar_rumah'] = $path_rumah;
        }

        // Menangani upload gambar KK
        if ($request->hasFile('gambar_kk')) {
            $fileName = time() . $request->file('gambar_kk')->getClientOriginalName();
            $path_kk = $request->file('gambar_kk')->storeAs('photos', $fileName, 'public');
            $validasi['gambar_kk'] = $path_kk;
        }

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $datkel = DatKel::user();
        $datkel->koor_geoloc = DB::raw("POINT($latitude, $longitude)");
        $datkel->bantuan = implode(',', $request->bantuan);
        $datkel->save();

        // Simpan data ke database
        $response = DatKel::create($validasi);
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
        'jmh_anggota' => 'required',
        'alamat' => 'required',
        'no_rumah' => 'required',
        'gambar_rumah' => 'required|mimes:png,jpg|max:1024',
        'gambar_kk' => 'required|mimes:png,jpg|max:1024',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'bantuan' => 'array',
        'bantuan.*' => 'in:KIP,KIS,PBH,PKH',
    ], $message);

    try {
        
        // Menangani upload gambar rumah
        if ($request->hasFile('gambar_rumah')) {
            $fileName = time() . $request->file('gambar_rumah')->getClientOriginalName();
            $path_rumah = $request->file('gambar_rumah')->storeAs('photos', $fileName, 'public');
            $validasi['gambar_rumah'] = $path_rumah;
        }

        // Menangani upload gambar KK
        if ($request->hasFile('gambar_kk')) {
            $fileName = time() . $request->file('gambar_kk')->getClientOriginalName();
            $path_kk = $request->file('gambar_kk')->storeAs('photos', $fileName, 'public');
            $validasi['gambar_kk'] = $path_kk;
        }

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $datkel = DatKel::user();
        $datkel->koor_geoloc = DB::raw("POINT($latitude, $longitude)");
        $datkel->save();

        $datkel = DatKel::user();
        $koor_geoloc = $datkel->koor_geoloc;
        $bantuan = explode(',', $datkel->bantuan);
        

        echo "Latitude: " . $koor_geoloc->getLat() . "<br>";
        echo "Longitude: " . $koor_geoloc->getLng();


        // Simpan data ke database
        $response = DatKel::find($id)->update($validasi);
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
