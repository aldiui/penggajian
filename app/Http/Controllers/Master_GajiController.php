<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Master_Gaji;
use App\Absensi;
use PDF;

class Master_GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $bulan1 = date('m');
        $tahun1 = date('Y');
        $index = Master_Gaji::getAbsensi($bulan1, $tahun1);
        return view('backend.v_master_gaji.index', [
            'judul' => "Master Gaji",
            'sub'   => "Data Master Gaji",
            'index' => $index,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]);
    }

    public function search(Request $request)
    {
        $bulan1 = $request->input('bulan');
        $tahun1 = $request->input('tahun');
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
        $index = Master_Gaji::getAbsensi($bulan1, $tahun1);
        return view('backend.v_master_gaji.index', [
            'judul' => "Master Gaji",
            'sub'   => "Data Master Gaji",
            'index' => $index,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.v_master_gaji.create', [
            'judul' => "Master Gaji",
            'sub'   => "Tambah Master Gaji",
            'absensi' => Absensi::all()->sortByDesc('created_at'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'absensi_id' => 'required',
            'total_gaji' => 'required'
        ]);
        Master_Gaji::create($data);
        //return 'Data berhasil tersimpan';
        return redirect('/master_gaji');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masterGaji = Master_Gaji::find($id);
        $absensi = Absensi::all()->sortByDesc('created_at');
        return view('backend.v_master_gaji.edit', [
            'judul' => "Master Gaji",
            'sub'   => "Edit Master Gaji",
            'masterGaji' => $masterGaji,
            'absensi' => $absensi,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'absensi_id' => 'required',
            'total_gaji' => 'required'
        ]);

        $masterGaji = Master_Gaji::find($id);
        $masterGaji->update($data);

        return redirect('/master_gaji');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masterGaji = Master_Gaji::find($id);
        $masterGaji->delete();

        return redirect('/master_gaji');
    }


    public function slipGajiPdf($id)
    {
        $masterGaji = Master_Gaji::find($id);
        $pdf = PDF::loadView('backend.v_master_gaji.show', [
            'mastergaji' => $masterGaji,
        ]);
        $options = [
            'margin_top' => 20,
            'margin_right' => 20,
            'margin_bottom' => 20,
            'margin_left' => 20,
        ];
        $pdf->setOptions($options);
        $namaFile = 'slip_gaji.pdf';
        $pdf->setPaper('A4', 'portrait');
        $pdfContent = $pdf->output();
        return response($pdfContent)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $namaFile . '"')
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }

}