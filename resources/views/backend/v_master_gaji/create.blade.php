@extends('backend.v_layouts.app')
@section('content')
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Tambah Master Gaji</div>
            <div class="ibox-tools">
                
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item">option 1</a>
                    <a class="dropdown-item">option 2</a>
                </div>
            </div>
        </div>
        <div class="ibox-body">
            <form action="/master_gaji" method="POST">
                @csrf

                <label>Nama Karyawan</label><br>
                <input type="text" name="nm_karyawan" value="{{old('nm_karyawan')}}" class="form-control @error('nm_karyawan') is-invalid @enderror" id="">
                @error('nm_karyawan')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Jabatan</label><br>
                <input type="text" name="" value="{{old('jabatan')}}" class="form-control @error('jabatan') is-invalid @enderror" id="">
                @error('jabatan')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Total Absensi</label><br>
                <select class="form-control @error('absensi') is-invalid @enderror" name="absensi_id">
                    <option value="" selected>--Total Absensi--</option>
                    @foreach($absensi as $k)
                    <option value="{{ $k->id }}"> {{ $k->hadir }} </option>
                    @endforeach
                </select>
                <p></p>

                <label>Total Gaji</label><br>
                <input type="text" name="total_gaji" value="{{old('total_gaji')}}" class="form-control @error('total_gaji') is-invalid @enderror" id="">
                @error('total_gaji')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <button class="btn btn-info" type="submit">Simpan</button>
                <a href="{{ route('master_gaji.index') }}"><button class="btn btn-default" type="button">Batal</button></a>
            </form>
        </div>
    </div>
</div>
@endsection