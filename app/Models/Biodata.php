<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodata';

    protected $fillable = [
        'operator_id',
        'nama_kepala_keluarga',
        'nik',
        'kk',
        'pekerjaan_id',
        'alamat',
        'komunitas_id',
        'banjar_id',
        'foto_kk',
        'foto_rumah',
        'jumlah_anggota',
        'latitude',
        'longitude',
    ];

    // Relasi ke tabel Operator
    public function operator()
    {
        return $this->belongsTo(Operator::class, 'operator_id', 'operator_id');
    }

    // Relasi ke tabel Pekerjaan
    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    // Relasi ke tabel Komunitas
    public function komunitas()
{
    return $this->belongsTo(Komunitas::class, 'komunitas_id', 'komunitas_id');
}

    // Relasi ke tabel Banjar
    public function banjar()
    {
        return $this->belongsTo(Banjar::class, 'banjar_id', 'banjar_id');
    }

    public function bantuan()
    {
        return $this->belongsTo(Bantuan::class, 'bantuan_id', 'bantuan_id');
    }

}