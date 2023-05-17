<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    public $timestamps = false;
    protected $table = "akun";
    protected $fillable = ['kd_akun', 'nama_akun'];
}
