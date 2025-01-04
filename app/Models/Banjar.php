<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banjar extends Model
{
    use HasFactory;

    public $primaryKey='banjar_id';
    protected $table="banjar";
    protected $fillable = ['nama_banjar'];
}