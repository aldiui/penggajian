@extends('backend.v_layouts.app')

@section('content')

<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">{{ $sub }}
        </div>
    </div>

    <div class="ibox-body">
        <a href="/master_gaji/create"> <button class="btn btn-primary" type="button"> <i class="ico fa fa-plus"></i>
                Tambah </button></a>
        <br><br>
        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Total Absensi</th>
                    <th>Total Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            @foreach ($index as $row)
            <tbody>
                <tr>
                    <td> {{$loop->iteration}} </td>
                    <td> {{$row->absensi->karyawan->nama }} </td>
                    <td> {{$row->absensi->karyawan->jabatan->nm_jabatan}} </td>
                    <td> {{$row->absensi->hadir}} </td>
                    <td> @formatRupiah($row->total_gaji) </td>
                    <td>
                        <a href="{{ route('master_gaji.edit', $row->id) }}" title="Ubah Data">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-edit"> Ubah</i></button>
                        </a>
                        <form action="{{ route('master_gaji.destroy', $row->id) }}" method="POST"
                            style="display: inline;">
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