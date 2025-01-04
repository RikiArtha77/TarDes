<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    public $primaryKey='pekerjaan_id';
    protected $table="pekerjaan";
    protected $fillable = ['nama_pekerjaan'];
}