<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    use HasFactory;
    public $primaryKey='bantuan_id';
    protected $table = 'bantuan';
    protected $fillable = [
        'operator_id',
        'choices',
    ];

    protected $casts = [
        'choices' => 'array', // Menyimpan data JSON sebagai array
    ];

    public function operator()
    {
        return $this->belongsTo(Operator::class, 'operator_id');
    }

    public function biodata()
    {
        return $this->hasMany(Biodata::class, 'bantuan_id', 'bantuan_id');
    }
}