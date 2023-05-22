<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $bulan = [
            [ "no" => 1, "nama" => "Januari"],
            [ "no" => 2, "nama" => "Februari"],
            [ "no" => 3, "nama" => "Maret"],
            [ "no" => 4, "nama" => "April"],
            [ "no" => 5, "nama" => "Mei"],
            [ "no" => 6, "nama" => "Juni"],
            [ "no" => 7, "nama" => "Juli"],
            [ "no" => 8, "nama" => "Agustus"],
            [ "no" => 9, "nama" => "September"],
            [ "no" => 10, "nama" => "Oktober"],
            [ "no" => 11, "nama" => "November"],
            [ "no" => 12, "nama" => "Desember"],
        ];

        $tahun = [
            date("Y"),
            date("Y") - 1,
            date("Y") - 2,
            date("Y") - 3,
            date("Y") - 4,
        ];

        return view('backend.v_laporan.index', [
            'judul' => "Laporan",
            'sub'   => "Data Laporan",
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]);
    }

    public function generatePDF(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        
        $absensi = Absensi::where('bulan', $bulan)
                            ->where('tahun', $tahun)
                            ->get();
    
        $pdf = PDF::loadView('backend.v_laporan.show', [
            'absensi' => $absensi,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]);
    
        // Set nama file PDF
        $namaFile = 'laporan_gaji_' . $bulan . '_' . $tahun . '.pdf';
        
        $options = [
            'margin_top' => 20,
            'margin_right' => 20,
            'margin_bottom' => 20,
            'margin_left' => 20,
        ];
        $pdf->setPaper('A4', 'landscape');
        $pdf->setOptions($options);
    
        // Menyimpan konten PDF sebagai string
        $pdfContent = $pdf->output();
    
        return response($pdfContent)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="'.$namaFile.'"')
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }
    
}