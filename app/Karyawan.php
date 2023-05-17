<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    public $timestamps = true;
    protected $table = "karyawan";
    protected $guarded = ['id'];
    // join ke jabatan 1:1
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
