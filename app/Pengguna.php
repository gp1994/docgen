<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = "user";
    protected $fillable = ['id','peng','usrn','roles','email','pwd'];
}
