<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Jabatan::all();
        return view('backend.v_jabatan.index', [
            'judul' => "Jabatan",
            'sub'   => "Data Jabatan",
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
        return view('backend.v_jabatan.create', [
            'judul' => "Jabatan",
            'sub'   => "Tambah Jabatan",
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
            'kd_jabatan' => 'required',
            'nm_jabatan' => 'required',
            'tunjangan_jabatan' => 'required|numeric',
            'gaji_pokok' => 'required|numeric'
        ]);
        Jabatan::create($data);
        //return 'Data berhasil tersimpan';
        return redirect('/jabatan');
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
        $jabatan = Jabatan::findOrFail($id);

        return view('backend.v_jabatan.edit', [
            'judul' => "Jabatan",
            'sub'   => "Edit Jabatan",
            'jabatan' => $jabatan
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
            'kd_jabatan' => 'required',
            'nm_jabatan' => 'required',
            'tunjangan_jabatan' => 'required|numeric',
            'gaji_pokok' => 'required|numeric'
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($data);

        return redirect('/jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect('/jabatan');
    }
}