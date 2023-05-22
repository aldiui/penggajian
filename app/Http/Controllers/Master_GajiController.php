<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Master_Gaji;
use App\Absensi;

class Master_GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Master_Gaji::all()->sortByDesc('created_at');
        return view('backend.v_master_gaji.index', [
            'judul' => "Master Gaji",
            'sub'   => "Data Master Gaji",
            'index' => $index
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
}