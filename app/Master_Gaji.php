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

    public static function getAbsensi($bulan, $tahun)
    {
        return Master_Gaji::join('absensi', 'absensi.id', '=', 'master_gaji.absensi_id')
            ->where('absensi.bulan', $bulan)
            ->where('absensi.tahun', $tahun)
            ->orderByDesc('master_gaji.created_at')
            ->get();
    }
}