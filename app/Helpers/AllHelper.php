<?php

namespace App\Helpers;

class AllHelper
{
    public function formatRupiah($angka)
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }

    public function getNamaBulan($nomorBulan, $bahasa = 'id')
    {
        $namaBulan = [
            'id' => [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember',
            ],
            // Tambahkan bahasa lain jika diperlukan
        ];

        return $namaBulan[$bahasa][$nomorBulan] ?? '';
    }
}
