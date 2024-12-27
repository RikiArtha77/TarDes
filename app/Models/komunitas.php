<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komunitas extends Model
{
    use HasFactory;
    public $primaryKey='komunitas_id';
    protected $table="komunitas";
    protected $fillable = [
        'komunitas_nama'
    ];

    public function packages (){
        return $this->hasMany(DatKel::class,'komunitas_id','komunitas_id');
    }
}
