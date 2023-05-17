@extends('backend.v_layouts.app')

@section('content')

<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">{{ $sub }}  
        </div>
    </div>
    
    <div class="ibox-body">
        <a href="/akun/create"> <button class="btn btn-primary" type="button"> <i class="ico fa fa-plus"></i>  Tambah  </button></a>
        <br><br>
        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            @foreach ($index as $row)
            <tbody>
                <tr>
                    <td> {{$loop->iteration}} </td>
                    <td> {{$row->kd_akun}} </td>
                    <td> {{$row->nama_akun}} </td>
                    <td>
                        <a href="#" title="Ubah Data">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-edit"> Ubah</i></button>
                        </a>

                        <a href="#" title="Hapus data" onclick="javascript: return confirm('Yakin mau dihapus?')">
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o "> Hapus</i></button>
                        </a>
                    </td>
                </tr>
            </tbody>
            @endforeach 
        </table>
    </div>
</div>
@endsection