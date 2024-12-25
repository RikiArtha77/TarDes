<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatKel extends Model
{
    use HasFactory;

    protected $table = "datkel";
    public $primaryKey = 'datkel_id';

    protected $fillable = [
        'nama_kpl', 'NIK', 'Pekerjaan', 'No_KK', 'jmh_anggota', 'alamat', 'no_rumah', 'komunitas_id','koor_geoloc', 'bantuan', 'gambar_rumah', 'gambar_kk',
    ];

    // Relasi dengan model Komunitas
    public function komunitas()
    {
        return $this->belongsTo(Komunitas::class, 'komunitas_id', 'komunitas_id');
    }

    protected $casts = [
        'koor_geoloc' => 'point', // Mengonversi field koor_geoloc menjadi objek Point
    ];
}