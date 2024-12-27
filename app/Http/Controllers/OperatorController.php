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
        $jumlahKeluarga = $datkel->count();
        return view('operatorr.daftarkeluarga', compact('datkel', 'jumlahKeluarga'));
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
        $response = DatKel::find($id)->update($validasi);

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
            // Mencari data berdasarkan ID
            $datkel = Datkel::find($id);

            // Jika data ditemukan, hapus dan kirimkan respons sukses
            if ($datkel) {
                $datkel->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil dihapus.'
                ]);
            }

            // Jika data tidak ditemukan, kirimkan respons gagal
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan.'
            ]);

        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
