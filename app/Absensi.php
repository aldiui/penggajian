<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    public $timestamps = true;
    protected $table = "absensi";
    protected $guarded = ['id'];
    // join ke jabatan 1:1
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
