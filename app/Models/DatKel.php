<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatKel extends Model
{
    use HasFactory;

    // Optional: If your table name follows Laravel conventions, this is not needed
    protected $table = "datkel";

    // Optional: Laravel uses 'id' as the primary key by default. You only need to specify it if it's different
    public $primaryKey = 'datkel_id';

    // Mass assignable attributes
    protected $fillable = [
        'komunitas_id', 'nama_kpl', 'NIK', 'Pekerjaan', 'No_KK', 'jmh_anggota', 'alamat', 'no_rumah',
        'koor_geoloc', 'bantuan', 'gambar_rumah', 'gambar_kk',
    ];

    // Relationships
    public function komunitas()
    {
        return $this->belongsTo(Komunitas::class, 'komunitas_id', 'komunitas_id');
    }

    // Casts
    protected $casts = [
        'koor_geoloc' => 'point', // Assuming this is a MySQL spatial column
        // If you have date columns, you could also cast them:
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Optional: Add custom methods or attributes as necessary
}
