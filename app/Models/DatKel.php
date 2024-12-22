<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatKel extends Model
{
    use HasFactory;
    public $primaryKey='datkel_id';
    protected $table="datkel";
    protected $fillable = [
        'nama_klp','NIK','Pekerjaan','NO_KK','jmh_anggota','alamat','no_rumah','koor_geoloc','bantuan','gambar_rumah','gambar_kk'
    ];
    public function komunitas(){
        return $this->belongsTo(komunitas::class,'komunitas_id','komunitas_id');
    }
}
