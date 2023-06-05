<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;
use App\Karyawan;

class AbsensiController extends Controller
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
        $bulan1 = date('Y');
        $tahun1 = date('m');
       $index = Absensi::where('bulan', $bulan1)
    ->where('tahun', $tahun1)
    ->orderByDesc('created_at')
    ->get();
        return view('backend.v_absensi.index', [
            'judul' => "Absensi",
            'sub'   => "Data Absensi",
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
       $index = Absensi::where('bulan', $bulan1)
        ->where('tahun', $tahun1)
        ->orderByDesc('created_at')
        ->get();
        return view('backend.v_absensi.index', [
            'judul' => "Absensi",
            'sub'   => "Data Absensi",
            'index' => $index,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]);
    }
    
    public function create()
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

        return view('backend.v_absensi.create', [
            'judul' => "Absensi",
            'sub'   => "Tambah Absensi",
            'karyawan' => Karyawan::all(),
            'bulan' => $bulan,
            'tahun' => $tahun,
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
            'karyawan_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'hadir' => 'required',
            'tidak_hadir' => 'required',
            'izin' => 'required',
            'lembur' => 'required'
        ]);
        Absensi::create($data);
        //return 'Data berhasil tersimpan';
        return redirect('/absensi');
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
        $absensi = Absensi::findOrFail($id);
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

        return view('backend.v_absensi.edit', [
            'judul' => "Absensi",
            'sub'   => "Edit Absensi",
            'absensi' => $absensi,
            'karyawan' => Karyawan::all(),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'karyawan_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'hadir' => 'required',
            'tidak_hadir' => 'required',
            'izin' => 'required',
            'lembur' => 'required'
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update($data);

        return redirect('/absensi');
    }


    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect('/absensi');
    }
}