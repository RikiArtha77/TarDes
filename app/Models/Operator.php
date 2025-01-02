<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Operator extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['username', 'password', 'level'];


    protected $hidden = ['password'];
}