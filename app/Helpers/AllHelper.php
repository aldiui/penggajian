<?php

namespace App\Helpers;

class AllHelper
{
    public static function formatRupiah($angka)
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}