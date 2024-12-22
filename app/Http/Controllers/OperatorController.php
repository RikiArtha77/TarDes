<?php

namespace App\Http\Controllers;

use App\Models\DatKel;
use App\Models\komunitas;
use Illuminate\Http\Request;

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
            'jmh_anggota' => 'required',
            'alamat' => 'required',
            'no_rumah' => 'required',
            'gambar_rumah' => 'required|mimes:png,jpg|max:1024',
            'gambar_kk' => 'required|mimes:png,jpg|max:1024',
        ], $message);

        try{
            // Simpan file gambar
            $fileName = time().$request->file('gambar_rumah')->getClientOriginalName();
            $fileName = time().$request->file('gambar_kk')->getClientOriginalName();

            $path = $request->file('gambar_rumah')->storeAs('photos', $fileName, 'public');
            $path = $request->file('gambar_kk')->storeAs('photos', $fileName, 'public');

            // Tambahkan path gambar ke data yang divalidasi
            $validasi['gambar_rumah'] = $path;
            $validasi['gambar_kk'] = $path;

            // Simpan data ke database
            $response = DatKel::create($validasi);
            return redirect('operator.daftarkeluarga');
        }catch (\Exception $e) {
            // Tangani error dengan pengembalian ke halaman sebelumnya
            echo $e->getMessage();
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
