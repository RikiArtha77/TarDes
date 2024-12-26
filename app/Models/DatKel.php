<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatKel extends Model
{
    use HasFactory;
    public $primaryKey = 'datkel_id';
    protected $table = "datkel";
    protected $fillable = [
        'komunitas_id', 'nama_kpl', 'NIK', 'Pekerjaan', 'No_KK', 'jmh_anggota', 'alamat', 'no_rumah',
        'latitude','longitude','gambar_rumah', 'gambar_kk',
    ];
    public function komunitas()
    {
        return $this->belongsTo(Komunitas::class, 'komunitas_id', 'komunitas_id');
    }
    //  // Setter untuk menyimpan data checkbox sebagai JSON string
    //  public function setBantuanAttribute($value)
    //  {
    //      $this->attributes['bantuan'] = json_encode($value);
    //  }
 
    //  // Getter untuk mengembalikan JSON string menjadi array
    //  public function getBantuanAttribute($value)
    //  {
    //      return json_decode($value, true);
    //  }
}
