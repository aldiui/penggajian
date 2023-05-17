<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_Gaji extends Model
{
    public $timestamps = true;
    protected $table = "master_gaji";
    protected $guarded = ['id'];
    // join ke jabatan 1:1
    public function Absensi()
    {
        return $this->belongsTo(Absensi::class);
    }
}
