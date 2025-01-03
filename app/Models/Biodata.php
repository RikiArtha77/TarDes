<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    public $primaryKey='id';
    protected $table="biodata";


    protected $fillable = [
        'operator_id',
        'nama_kepala_keluarga',
        'nik',
        'kk',
        'pekerjaan_id',
        'komunitas_id',
        'banjar_id',
        'alamat',
        'foto_kk',
        'foto_rumah',
        'jumlah_keluarga',
    ];

    /**
     * Relasi dengan model Operator.
     */
    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

    /**
     * Relasi dengan model Pekerjaan.
     */
    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    /**
     * Relasi dengan model Komunitas.
     */
    public function komunitas()
    {
        return $this->belongsTo(komunitas::class);
    }

    /**
     * Relasi dengan model Banjar.
     */
    public function banjar()
    {
        return $this->belongsTo(Banjar::class);
    }
}
