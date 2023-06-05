@extends('backend.v_layouts.app')

@section('content')

<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">Cari {{ $sub }}
        </div>
    </div>
    <div class="ibox-body">
        <form action="{{ route('master_gaji/cari') }}" method="POST">
            @csrf
    
            <label>Bulan</label><br>
            <select class="form-control @error('bulan') is-invalid @enderror" name="bulan">
                <option value="" selected>--Pilih Bulan--</option>
                @foreach($bulan as $b)
                <option value="{{ $b['no'] }}"> {{ $b['nama'] }} </option>
                @endforeach
            </select>
            @error('bulan')
            <span class="invalid-feedback alert-danger" role="alert">
                {{ $message }}
            </span>
            @enderror
            <p></p>
    
            <label>Tahun</label><br>
            <select class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                <option value="" selected>--Pilih Tahun--</option>
                @foreach($tahun as $t)
                <option value="{{ $t }}"> {{ $t }} </option>
                @endforeach
            </select>
            @error('tahun')
            <span class="invalid-feedback alert-danger" role="alert">
                {{ $message }}
            </span>
            @enderror
            <p></p>
            <button class="btn btn-info" type="submit">Cari Data</button>
        </form>
    </div>
</div>
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
                        <a href="{{ route('slipgaji-pdf', $row->id) }}" title="Ubah Data">
                            <button class="btn btn-info btn-sm"><i class="fa fa-print"> Cetak</i></button>
                        </a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection