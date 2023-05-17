<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    public $timestamps = false;
    protected $table = "jabatan";
    protected $fillable = [ 'kd_jabatan', 'nm_jabatan', 'tunjangan_jabatan', 'gaji_pokok' ];
}
