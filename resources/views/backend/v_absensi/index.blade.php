@extends('backend.v_layouts.app')

@section('content')

<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">{{ $sub }}
        </div>
    </div>

    <div class="ibox-body">
        <a href="/absensi/create"> <button class="btn btn-primary" type="button"> <i class="ico fa fa-plus"></i> Tambah
            </button></a>
        <br><br>
        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Bulan</th>
                    <th>Hadir</th>
                    <th>Tidak Hadir</th>
                    <th>Izin</th>
                    <th>Lembur</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            @foreach ($index as $row)
            <tbody>
                <tr>
                    <td> {{$loop->iteration}} </td>
                    <td> {{$row->karyawan->nama}} </td>
                    <td> @getNamaBulan($row->bulan) {{$row->tahun}} </td>
                    <td> {{$row->hadir}} </td>
                    <td> {{$row->tidak_hadir}} </td>
                    <td> {{$row->izin}} </td>
                    <td> {{$row->lembur}} </td>
                    <td>
                        <a href="{{ route('absensi.edit', $row->id) }}" title="Ubah Data">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-edit"> Ubah</i></button>
                        </a>
                        <form action="{{ route('absensi.destroy', $row->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin mau dihapus?')">
                                <i class="fa fa-trash-o "> Hapus</i>
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection