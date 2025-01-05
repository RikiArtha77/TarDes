<?php

namespace App\Http\Controllers;

use App\Models\Banjar;
use App\Models\Biodata;
use App\Models\DatKel;
use App\Models\komunitas;
use App\Models\Operator;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $biodata = Biodata::all();
        $komunitas = komunitas::all();
        $banjar = Banjar::all();
        return view('operatorr.daftarkeluarga', compact('biodata', 'banjar','komunitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    public function store(Request $request) 
{
    
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
    public function edit($id)
{
    $pekerjaan = Pekerjaan::all();
    $banjar = Banjar::all();
    $komunitas = komunitas::all();
    $biodata=Biodata::find($id);;
    return view('operatorr.bio', compact( 'komunitas','biodata','banjar','pekerjaan'));
}



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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

        // Simpan data ke database
        $response = Biodata::find($id)->update($validatedData);

        return redirect()->route('operator.daftarkeluarga')->with('success', 'Data berhasil disimpan!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
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